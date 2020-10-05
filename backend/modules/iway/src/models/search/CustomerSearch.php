<?php

namespace modava\iway\models\search;

use modava\iway\models\Customer;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CustomerSearch represents the model behind the search form of `modava\iway\models\Customer`.
 */
class CustomerSearch extends Customer
{
    public $keyword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'province_id', 'district_id', 'ward_id', 'online_sales_id', 'co_so_id', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['code', 'fullname', 'avatar', 'phone', 'sex', 'birthday', 'address', 'online_source', 'fb_fanpage', 'fb_customer', 'online_sales_note', 'status_customer', 'reason_fail', 'who_created', 'description', 'keyword', 'created_at'], 'safe'],
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
        $query = Customer::find();

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
            'OR',
            ['like', 'fullname', $this->keyword],
            ['like', 'phone', $this->keyword],
            ['like', 'code', $this->keyword],
        ]);

        $query->andFilterWhere([
            'id' => $this->id,
            'birthday' => $this->birthday,
            'province_id' => $this->province_id,
            'district_id' => $this->district_id,
            'ward_id' => $this->ward_id,
            'online_sales_id' => $this->online_sales_id,
            'co_so_id' => $this->co_so_id,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'online_source', $this->online_source])
            ->andFilterWhere(['like', 'fb_fanpage', $this->fb_fanpage])
            ->andFilterWhere(['like', 'fb_customer', $this->fb_customer])
            ->andFilterWhere(['like', 'online_sales_note', $this->online_sales_note])
            ->andFilterWhere(['like', 'status_customer', $this->status_customer])
            ->andFilterWhere(['like', 'reason_fail', $this->reason_fail])
            ->andFilterWhere(['like', 'who_created', $this->who_created])
            ->andFilterWhere(['like', 'description', $this->description]);

        if ($this->created_at) {
            $created_at = explode(' - ', $this->created_at);
            $query->andFilterWhere(['between', 'created_at', strtotime($created_at[0]), strtotime($created_at[1] . ' 23:59:59')]);
        }

        return $dataProvider;
    }
}
