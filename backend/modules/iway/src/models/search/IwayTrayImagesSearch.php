<?php

namespace modava\iway\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modava\iway\models\IwayTrayImages;

/**
 * IwayTrayImagesSearch represents the model behind the search form of `modava\iway\models\IwayTrayImages`.
 */
class IwayTrayImagesSearch extends IwayTrayImages
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tray_id', 'type', 'created_at', 'evaluate_at', 'evaluate_by'], 'integer'],
            [['image', 'status', 'evaluate'], 'safe'],
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
        $query = IwayTrayImages::find();

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
            'tray_id' => $this->tray_id,
            'type' => $this->type,
            'created_at' => $this->created_at,
            'evaluate_at' => $this->evaluate_at,
            'evaluate_by' => $this->evaluate_by,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'evaluate', $this->evaluate]);

        return $dataProvider;
    }
}
