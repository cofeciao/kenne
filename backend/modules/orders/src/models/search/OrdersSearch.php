<?php

namespace modava\orders\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modava\orders\models\Orders;

/**
 * OrdersSearch represents the model behind the search form of `modava\orders\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_tr', 'id_pro', 'or_quantity', 'or_price'], 'integer'],
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
        $query = Orders::find();

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
            'id_tr' => $this->id_tr,
            'id_pro' => $this->id_pro,
            'or_quantity' => $this->or_quantity,
            'or_price' => $this->or_price,
        ]);

        return $dataProvider;
    }
}
