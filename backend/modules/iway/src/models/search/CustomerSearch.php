<?php

namespace modava\iway\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modava\iway\models\Customer;

/**
 * CustomerSearch represents the model behind the search form of `modava\iway\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ward_id', 'country_id', 'province_id', 'district_id','fanpage_id', 'direct_sale_id', 'online_sales_id','co_so', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['code', 'name', 'birthday', 'sex', 'phone', 'address', 'avatar', 'type', 'sale_online_note', 'direct_sale_note', 'status'], 'safe'],
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
            'id' => $this->id,
            'birthday' => $this->birthday,
            'ward_id' => $this->ward_id,
            'fanpage_id' => $this->fanpage_id,
            'online_sales_id' => $this->online_sales_id,
            'direct_sale_id' => $this->direct_sale_id,
            'co_so' => $this->co_so,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'sale_online_note', $this->sale_online_note])
            ->andFilterWhere(['like', 'direct_sale_note', $this->direct_sale_note])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
