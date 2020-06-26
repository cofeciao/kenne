<?php

namespace modava\report\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\report\ReportModule;
use modava\report\models\table\ReportFacebookAdsTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "report_facebook_ads".
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
class ReportFacebookAds extends ReportFacebookAdsTable
{
    public $toastr_key = 'report-facebook-ads';
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
            'id' => ReportModule::t('report', 'ID'),
            'don_vi' => ReportModule::t('report', 'Đơn vị'),
            'so_tien_chay' => ReportModule::t('report', 'Số tiền chạy'),
            'hien_thi' => ReportModule::t('report', 'Hiển thị'),
            'tiep_can' => ReportModule::t('report', 'Tiếp cận'),
            'binh_luan' => ReportModule::t('report', 'Bình luận'),
            'tin_nhan' => ReportModule::t('report', 'Tin nhắn'),
            'page_chay' => ReportModule::t('report', 'Page chạy'),
            'location_id' => ReportModule::t('report', 'Khu vực chạy'),
            'san_pham' => ReportModule::t('report', 'Sản phẩm'),
            'tuong_tac' => ReportModule::t('report', 'Tương tác'),
            'so_dien_thoai' => ReportModule::t('report', 'Số điện thoại'),
            'goi_duoc' => ReportModule::t('report', 'Gọi được'),
            'lich_hen' => ReportModule::t('report', 'Lịch hẹn'),
            'khach_den' => ReportModule::t('report', 'Khách đến'),
            'ngay_chay' => ReportModule::t('report', 'Ngày chạy'),
            'money_hienthi' => ReportModule::t('report', 'Giá hiển thị'),
            'money_tiepcan' => ReportModule::t('report', 'Giá tiếp cận'),
            'money_binhluan' => ReportModule::t('report', 'Giá bình luận'),
            'money_tinnhan' => ReportModule::t('report', 'Giá tin nhắn'),
            'money_tuongtac' => ReportModule::t('report', 'Giá tương tác'),
            'money_sodienthoai' => ReportModule::t('report', 'Giá SĐT'),
            'money_goiduoc' => ReportModule::t('report', 'Giá gọi được'),
            'money_lichhen' => ReportModule::t('report', 'Giá lịch hẹn'),
            'money_khachden' => ReportModule::t('report', 'Giá khách đến'),
            'status' => ReportModule::t('report', 'Status'),
            'created_at' => ReportModule::t('report', 'Ngày tạo'),
            'updated_at' => ReportModule::t('report', 'Ngày cập nhật'),
            'created_by' => ReportModule::t('report', 'Tạo bởi'),
            'updated_by' => ReportModule::t('report', 'Cập nhật bởi'),
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
