<?php

namespace modava\test\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modava\test\models\LocationCountry;

/**
 * LocationCountrySearch represents the model behind the search form of `modava\test\models\LocationCountry`.
 */
class LocationCountrySearch extends LocationCountry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'SortOrder', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['CountryCode', 'CommonName', 'slug', 'FormalName', 'CountryType', 'CountrySubType', 'Sovereignty', 'Capital', 'CurrencyCode', 'CurrencyName', 'TelephoneCode', 'CountryCode3', 'CountryNumber', 'InternetCountryCode', 'status', 'language', 'Flags', 'IsDeleted'], 'safe'],
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
        $query = LocationCountry::find();

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
            'SortOrder' => $this->SortOrder,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'CountryCode', $this->CountryCode])
            ->andFilterWhere(['like', 'CommonName', $this->CommonName])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'FormalName', $this->FormalName])
            ->andFilterWhere(['like', 'CountryType', $this->CountryType])
            ->andFilterWhere(['like', 'CountrySubType', $this->CountrySubType])
            ->andFilterWhere(['like', 'Sovereignty', $this->Sovereignty])
            ->andFilterWhere(['like', 'Capital', $this->Capital])
            ->andFilterWhere(['like', 'CurrencyCode', $this->CurrencyCode])
            ->andFilterWhere(['like', 'CurrencyName', $this->CurrencyName])
            ->andFilterWhere(['like', 'TelephoneCode', $this->TelephoneCode])
            ->andFilterWhere(['like', 'CountryCode3', $this->CountryCode3])
            ->andFilterWhere(['like', 'CountryNumber', $this->CountryNumber])
            ->andFilterWhere(['like', 'InternetCountryCode', $this->InternetCountryCode])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'Flags', $this->Flags])
            ->andFilterWhere(['like', 'IsDeleted', $this->IsDeleted]);

        return $dataProvider;
    }
}
