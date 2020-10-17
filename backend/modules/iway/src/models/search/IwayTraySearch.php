<?php

namespace modava\iway\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modava\iway\models\IwayTray;

/**
 * IwayTraySearch represents the model behind the search form of `modava\iway\models\IwayTray`.
 */
class IwayTraySearch extends IwayTray
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'date_delivery', 'user_delivery', 'treatment_schedule_id', 'espect_date_begin', 'espect_date_end', 'date_begin', 'date_end', 'result', 'status'], 'integer'],
            [['name', 'code', 'note'], 'safe'],
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
        $query = IwayTray::find();

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
            'date_delivery' => $this->date_delivery,
            'user_delivery' => $this->user_delivery,
            'treatment_schedule_id' => $this->treatment_schedule_id,
            'espect_date_begin' => $this->espect_date_begin,
            'espect_date_end' => $this->espect_date_end,
            'date_begin' => $this->date_begin,
            'date_end' => $this->date_end,
            'result' => $this->result,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
