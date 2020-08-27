<?php

namespace modava\iway\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modava\iway\models\Fanpage;

/**
 * FanpageSearch represents the model behind the search form of `modava\iway\models\Fanpage`.
 */
class FanpageSearch extends Fanpage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'origin_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'description', 'url_page', 'status', 'language'], 'safe'],
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
        $query = Fanpage::find();

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
            'origin_id' => $this->origin_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'url_page', $this->url_page])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'language', $this->language]);

        return $dataProvider;
    }
}
