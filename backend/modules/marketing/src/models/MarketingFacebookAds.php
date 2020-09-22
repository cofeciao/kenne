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
    const FB_ADS = 'fb-ads';

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
			[['don_vi', 'page_chay', 'location_id', 'san_pham', 'tuong_tac', 'so_dien_thoai', 'goi_duoc', 'lich_hen', 'khach_den', 'ngay_chay', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
			[['money_hienthi', 'money_tiepcan', 'money_binhluan', 'money_tinnhan', 'money_tuongtac', 'money_sodienthoai', 'money_goiduoc', 'money_lichhen', 'money_khachden'], 'integer'],
            [['hien_thi', 'tiep_can', 'page_chay'], 'required', 'on' => self::FB_ADS],
            [['hien_thi', 'tiep_can', 'binh_luan', 'tin_nhan', 'ngay_chay'], 'safe'],
            [['binh_luan', 'tin_nhan', 'ngay_chay', 'location_id', 'so_tien_chay'], 'required'],
            [['so_tien_chay'], 'string', 'max' => 25],
            [['hien_thi', 'tiep_can', 'binh_luan', 'tin_nhan', 'so_tien_chay'], 'checkNumber'],
		];
    }

    /**
     * Check Number
     */
    public function checkNumber($attribute, $params, $validator)
    {
        if (!$this->hasErrors()) {
            if (!is_numeric(str_replace([',', '.'], '', $this->$attribute))) {
            }
        }
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'don_vi' => Yii::t('backend', 'Đơn vị'),
            'so_tien_chay' => Yii::t('backend', 'Số tiền chạy'),
            'hien_thi' => Yii::t('backend', 'Hiển thị'),
            'tiep_can' => Yii::t('backend', 'Tiếp cận'),
            'binh_luan' => Yii::t('backend', 'Bình luận'),
            'tin_nhan' => Yii::t('backend', 'Tin nhắn'),
            'page_chay' => Yii::t('backend', 'Page chạy'),
            'location_id' => Yii::t('backend', 'Khu vực chạy'),
            'san_pham' => Yii::t('backend', 'Sản phẩm'),
            'tuong_tac' => Yii::t('backend', 'Tương tác'),
            'so_dien_thoai' => Yii::t('backend', 'SĐT'),
            'goi_duoc' => Yii::t('backend', 'Gọi được'),
            'lich_hen' => Yii::t('backend', 'Lịch hẹn'),
            'khach_den' => Yii::t('backend', 'Khách đến'),
            'ngay_chay' => Yii::t('backend', 'Ngày chạy'),
            'money_hienthi' => Yii::t('backend', 'Giá hiển thị'),
            'money_tiepcan' => Yii::t('backend', 'Giá tiếp cập'),
            'money_binhluan' => Yii::t('backend', 'Giá bình luận'),
            'money_tinnhan' => Yii::t('backend', 'Giá tin nhắn'),
            'money_tuongtac' => Yii::t('backend', 'Giá tương tác'),
            'money_sodienthoai' => Yii::t('backend', 'Giá SĐT'),
            'money_goiduoc' => Yii::t('backend', 'Giá gọi được'),
            'money_lichhen' => Yii::t('backend', 'Giá lịch hẹn'),
            'money_khachden' => Yii::t('backend', 'Giá khách đến'),
            'status' => Yii::t('backend', 'Status'),
            'created_at' => Yii::t('backend', 'Ngày tạo'),
            'updated_at' => Yii::t('backend', 'Ngày cập nhật'),
            'created_by' => Yii::t('backend', 'Tạo bởi'),
            'updated_by' => Yii::t('backend', 'Cập nhật bởi'),
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
