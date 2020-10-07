<?php

namespace modava\iway\models\search;

use modava\iway\helpers\Utils;
use modava\iway\models\Call;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CallSearch represents the model behind the search form of `modava\iway\models\Call`.
 */
class CallSearch extends Call
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title', 'status', 'start_time', 'description', 'created_at'], 'safe'],
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
        $query = Call::find();

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
            'customer_id' => $this->customer_id,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'description', $this->description]);

        if ($this->created_at) {
            $created_at = explode(' - ', $this->created_at);
            $query->andFilterWhere(['between', 'created_at', strtotime($created_at[0]), strtotime($created_at[1] . ' 23:59:59')]);
        }

        if ($this->start_time) {
            $start_time = explode(' - ', $this->start_time);
            $query->andFilterWhere(['between', 'date(start_time)', Utils::convertDateToDBFormat($start_time[0]), Utils::convertDateToDBFormat($start_time[1])]);
        }

        return $dataProvider;
    }
}
