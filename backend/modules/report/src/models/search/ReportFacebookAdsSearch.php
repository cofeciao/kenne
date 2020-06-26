<?php

namespace modava\report\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modava\report\models\ReportFacebookAds;

/**
 * ReportFacebookAdsSearch represents the model behind the search form of `modava\report\models\ReportFacebookAds`.
 */
class ReportFacebookAdsSearch extends ReportFacebookAds
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'don_vi', 'hien_thi', 'tiep_can', 'binh_luan', 'tin_nhan', 'page_chay', 'location_id', 'san_pham', 'tuong_tac', 'so_dien_thoai', 'goi_duoc', 'lich_hen', 'khach_den', 'ngay_chay', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['so_tien_chay', 'status'], 'safe'],
            [['money_hienthi', 'money_tiepcan', 'money_binhluan', 'money_tinnhan', 'money_tuongtac', 'money_sodienthoai', 'money_goiduoc', 'money_lichhen', 'money_khachden'], 'number'],
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
        $query = ReportFacebookAds::find();

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
            'don_vi' => $this->don_vi,
            'hien_thi' => $this->hien_thi,
            'tiep_can' => $this->tiep_can,
            'binh_luan' => $this->binh_luan,
            'tin_nhan' => $this->tin_nhan,
            'page_chay' => $this->page_chay,
            'location_id' => $this->location_id,
            'san_pham' => $this->san_pham,
            'tuong_tac' => $this->tuong_tac,
            'so_dien_thoai' => $this->so_dien_thoai,
            'goi_duoc' => $this->goi_duoc,
            'lich_hen' => $this->lich_hen,
            'khach_den' => $this->khach_den,
            'ngay_chay' => $this->ngay_chay,
            'money_hienthi' => $this->money_hienthi,
            'money_tiepcan' => $this->money_tiepcan,
            'money_binhluan' => $this->money_binhluan,
            'money_tinnhan' => $this->money_tinnhan,
            'money_tuongtac' => $this->money_tuongtac,
            'money_sodienthoai' => $this->money_sodienthoai,
            'money_goiduoc' => $this->money_goiduoc,
            'money_lichhen' => $this->money_lichhen,
            'money_khachden' => $this->money_khachden,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'so_tien_chay', $this->so_tien_chay])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
