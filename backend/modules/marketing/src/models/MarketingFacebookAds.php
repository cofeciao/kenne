<?php

namespace modava\marketing\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\marketing\MarketingModule;
use modava\marketing\models\table\MarketingFacebookAdsTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "marketing_facebook_ads".
*
    * @property int $id
    * @property int $don_vi
    * @property string $so_tien_chay
    * @property int $hien_thi
    * @property int $tiep_can
    * @property int $binh_luan
    * @property int $tin_nhan
    * @property int $page_chay
    * @property int $location_id
    * @property int $san_pham
    * @property int $tuong_tac
    * @property int $so_dien_thoai
    * @property int $goi_duoc
    * @property int $lich_hen
    * @property int $khach_den
    * @property int $ngay_chay
    * @property double $money_hienthi
    * @property double $money_tiepcan
    * @property double $money_binhluan
    * @property double $money_tinnhan
    * @property double $money_tuongtac
    * @property double $money_sodienthoai
    * @property double $money_goiduoc
    * @property double $money_lichhen
    * @property double $money_khachden
    * @property int $status 0:disabled, 1:activated
    * @property int $created_at
    * @property int $updated_at
    * @property int $created_by
    * @property int $updated_by
*/
class MarketingFacebookAds extends MarketingFacebookAdsTable
{
    public $toastr_key = 'marketing-facebook-ads';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                [
                    'class' => BlameableBehavior::class,
                    'createdByAttribute' => 'created_by',
                    'updatedByAttribute' => 'updated_by',
                ],
                'timestamp' => [
                    'class' => 'yii\behaviors\TimestampBehavior',
                    'preserveNonEmptyValues' => true,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ],
                ],
            ]
        );
    }

    /**
    * {@inheritdoc}
    */
    public function rules()
    {
        return [
			[['don_vi', 'hien_thi', 'tiep_can', 'binh_luan', 'tin_nhan', 'page_chay', 'location_id', 'san_pham', 'tuong_tac', 'so_dien_thoai', 'goi_duoc', 'lich_hen', 'khach_den', 'ngay_chay', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
			[['so_tien_chay'], 'required'],
			[['money_hienthi', 'money_tiepcan', 'money_binhluan', 'money_tinnhan', 'money_tuongtac', 'money_sodienthoai', 'money_goiduoc', 'money_lichhen', 'money_khachden'], 'number'],
			[['so_tien_chay'], 'string', 'max' => 25],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => MarketingModule::t('marketing', 'ID'),
            'don_vi' => MarketingModule::t('marketing', 'Don Vi'),
            'so_tien_chay' => MarketingModule::t('marketing', 'So Tien Chay'),
            'hien_thi' => MarketingModule::t('marketing', 'Hien Thi'),
            'tiep_can' => MarketingModule::t('marketing', 'Tiep Can'),
            'binh_luan' => MarketingModule::t('marketing', 'Binh Luan'),
            'tin_nhan' => MarketingModule::t('marketing', 'Tin Nhan'),
            'page_chay' => MarketingModule::t('marketing', 'Page Chay'),
            'location_id' => MarketingModule::t('marketing', 'Location ID'),
            'san_pham' => MarketingModule::t('marketing', 'San Pham'),
            'tuong_tac' => MarketingModule::t('marketing', 'Tuong Tac'),
            'so_dien_thoai' => MarketingModule::t('marketing', 'So Dien Thoai'),
            'goi_duoc' => MarketingModule::t('marketing', 'Goi Duoc'),
            'lich_hen' => MarketingModule::t('marketing', 'Lich Hen'),
            'khach_den' => MarketingModule::t('marketing', 'Khach Den'),
            'ngay_chay' => MarketingModule::t('marketing', 'Ngay Chay'),
            'money_hienthi' => MarketingModule::t('marketing', 'Money Hienthi'),
            'money_tiepcan' => MarketingModule::t('marketing', 'Money Tiepcan'),
            'money_binhluan' => MarketingModule::t('marketing', 'Money Binhluan'),
            'money_tinnhan' => MarketingModule::t('marketing', 'Money Tinnhan'),
            'money_tuongtac' => MarketingModule::t('marketing', 'Money Tuongtac'),
            'money_sodienthoai' => MarketingModule::t('marketing', 'Money Sodienthoai'),
            'money_goiduoc' => MarketingModule::t('marketing', 'Money Goiduoc'),
            'money_lichhen' => MarketingModule::t('marketing', 'Money Lichhen'),
            'money_khachden' => MarketingModule::t('marketing', 'Money Khachden'),
            'status' => MarketingModule::t('marketing', 'Status'),
            'created_at' => MarketingModule::t('marketing', 'Created At'),
            'updated_at' => MarketingModule::t('marketing', 'Updated At'),
            'created_by' => MarketingModule::t('marketing', 'Created By'),
            'updated_by' => MarketingModule::t('marketing', 'Updated By'),
        ];
    }

    /**
    * Gets query for [[User]].
    *
    * @return \yii\db\ActiveQuery
    */
    public function getUserCreated()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
    * Gets query for [[User]].
    *
    * @return \yii\db\ActiveQuery
    */
    public function getUserUpdated()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }
}
