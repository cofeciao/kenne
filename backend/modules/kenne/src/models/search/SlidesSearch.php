<?php

namespace modava\kenne\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modava\kenne\models\Slides;

/**
 * SlidesSearch represents the model behind the search form of `modava\kenne\models\Slides`.
 */
class SlidesSearch extends Slides
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sld_cat_id', 'created_at', 'updated_at'], 'integer'],
            [['sld_title', 'sld_description', 'sld_image', 'sld_status'], 'safe'],
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
        $query = Slides::find();

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
            'sld_cat_id' => $this->sld_cat_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'sld_title', $this->sld_title])
            ->andFilterWhere(['like', 'sld_description', $this->sld_description])
            ->andFilterWhere(['like', 'sld_image', $this->sld_image])
            ->andFilterWhere(['like', 'sld_status', $this->sld_status]);

        return $dataProvider;
    }
}
