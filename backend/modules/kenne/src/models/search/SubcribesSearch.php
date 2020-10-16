<?php

namespace modava\kenne\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modava\kenne\models\Subcribes;

/**
 * SubcribesSearch represents the model behind the search form of `modava\kenne\models\Subcribes`.
 */
class SubcribesSearch extends Subcribes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['sub_email', 'sub_status'], 'safe'],
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
        $query = Subcribes::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'sub_email', $this->sub_email])
            ->andFilterWhere(['like', 'sub_status', $this->sub_status]);

        return $dataProvider;
    }
}
