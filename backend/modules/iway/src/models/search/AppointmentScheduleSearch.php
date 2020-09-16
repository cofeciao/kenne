<?php

namespace modava\iway\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modava\iway\models\AppointmentSchedule;

/**
 * AppointmentScheduleSearch represents the model behind the search form of `modava\iway\models\AppointmentSchedule`.
 */
class AppointmentScheduleSearch extends AppointmentSchedule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'co_so_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title', 'start_time', 'status', 'status_service', 'accept_for_service', 'reason_fail', 'check_in_time', 'description'], 'safe'],
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
        $query = AppointmentSchedule::find();

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
            'co_so_id' => $this->co_so_id,
            'start_time' => $this->start_time,
            'check_in_time' => $this->check_in_time,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'status_service', $this->status_service])
            ->andFilterWhere(['like', 'accept_for_service', $this->accept_for_service])
            ->andFilterWhere(['like', 'reason_fail', $this->reason_fail])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}