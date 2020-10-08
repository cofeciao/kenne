<?php

namespace modava\iway\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modava\iway\models\Order;

/**
 * OrderSearch represents the model behind the search form of `modava\iway\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'co_so_id', 'customer_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title', 'code', 'order_date', 'status', 'payment_status', 'service_status'], 'safe'],
            [['total', 'discount', 'final_total'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Order::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'co_so_id' => $this->co_so_id,
            'customer_id' => $this->customer_id,
            'order_date' => $this->order_date,
            'total' => $this->total,
            'discount' => $this->discount,
            'final_total' => $this->final_total,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'payment_status', $this->payment_status])
            ->andFilterWhere(['like', 'service_status', $this->service_status]);

        return $dataProvider;
    }
}
