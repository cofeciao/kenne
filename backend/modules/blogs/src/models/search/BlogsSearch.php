<?php

namespace modava\blogs\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modava\blogs\models\Blogs;

/**
 * BlogsSearch represents the model behind the search form of `modava\blogs\models\Blogs`.
 */
class BlogsSearch extends Blogs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['image', 'title', 'descriptions', 'date', 'comments', 'search', 'recent_post', 'tags'], 'safe'],
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
        $query = Blogs::find();

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
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'descriptions', $this->descriptions])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'search', $this->search])
            ->andFilterWhere(['like', 'recent_post', $this->recent_post])
            ->andFilterWhere(['like', 'tags', $this->tags]);

        return $dataProvider;
    }
}
