<?php

namespace modava\products\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modava\products\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `modava\products\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pro_quantity', 'pro_price', 'created_at', 'updated_at'], 'integer'],
            [['pro_name', 'pro_slug', 'pro_description', 'pro_image', 'pro_status', 'pro_sale'], 'safe'],
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
        $query = Products::find();

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
            'pro_quantity' => $this->pro_quantity,
            'pro_price' => $this->pro_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'pro_name', $this->pro_name])
            ->andFilterWhere(['like', 'pro_slug', $this->pro_slug])
            ->andFilterWhere(['like', 'pro_description', $this->pro_description])
            ->andFilterWhere(['like', 'pro_image', $this->pro_image])
            ->andFilterWhere(['like', 'pro_status', $this->pro_status])
            ->andFilterWhere(['like', 'pro_sale', $this->pro_sale]);

        return $dataProvider;
    }
}
