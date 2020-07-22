<?php

namespace modava\transactions\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modava\transactions\models\Transactions;

/**
 * TransactionsSearch represents the model behind the search form of `modava\transactions\models\Transactions`.
 */
class TransactionsSearch extends Transactions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tr_id_customer', 'tr_phone', 'tr_total', 'created_at', 'updated_at'], 'integer'],
            [['tr_name', 'tr_address', 'tr_status'], 'safe'],
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
        $query = Transactions::find();

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
            'tr_id_customer' => $this->tr_id_customer,
            'tr_phone' => $this->tr_phone,
            'tr_total' => $this->tr_total,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'tr_name', $this->tr_name])
            ->andFilterWhere(['like', 'tr_address', $this->tr_address])
            ->andFilterWhere(['like', 'tr_status', $this->tr_status]);

        return $dataProvider;
    }
}
