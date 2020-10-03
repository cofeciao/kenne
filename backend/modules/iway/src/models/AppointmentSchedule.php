<?php

namespace modava\iway\models;

use common\models\User;
use modava\iway\helpers\Utils;
use modava\iway\models\table\AppointmentScheduleTable;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "iway_appointment_schedule".
 *
 * @property int $id
 * @property string $title
 * @property int $customer_id Khách hàng
 * @property int $co_so_id Cơ sở
 * @property string $start_time Ngày hẹn
 * @property string $status Tình trạng: đặt hẹn, đến, không đến.
 * @property string $status_service Tình trạng làm dịch vụ: Đồng ý, không đồng ý
 * @property string $accept_for_service Dịch vụ chọn khi đồng ý
 * @property string $reason_fail Lý do không làm dịch vụ mặc dù đã đến
 * @property string $check_in_time Thời gian khách đến
 * @property string $description
 * @property string $direct_sales_note
 * @property integer $direct_sales_id
 * @property integer $doctor_thamkham_id
 * @property string $doctor_thamkham_note
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property CoSo $coSo
 * @property User $createdBy
 * @property Customer $customer
 * @property User $updatedBy
 */
class AppointmentSchedule extends AppointmentScheduleTable
{
    const STATUS_DEN = 'den';
    const SERVICE_STATUS_KHONG_DONG_Y_LAM = 'khong_dong_y_lam';
    const SERVICE_STATUS_DONG_Y_LAM = 'dong_y_lam';
    public $toastr_key = 'appointment-schedule';

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
                    'preserveNonEmptyValues' => false,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ],
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['start_time'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['start_time'],
                    ],
                    'value' => function ($event) {
                        return Utils::convertDateTimeToDBFormat($this->start_time);
                    },
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['check_in_time'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['check_in_time'],
                    ],
                    'value' => function ($event) {
                        return Utils::convertDateTimeToDBFormat($this->check_in_time);
                    },
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
            [['title', 'customer_id', 'co_so_id', 'start_time', 'status',], 'required'],
            [['customer_id', 'co_so_id', 'direct_sales_id'], 'integer'],
            [['start_time', 'check_in_time'], 'safe'],
            [['description', 'direct_sales_note'], 'string'],
            [['title', 'accept_for_service', 'reason_fail'], 'string', 'max' => 255],
            [['status', 'status_service'], 'string', 'max' => 50],
            [['status_service', 'check_in_time'], 'required', 'when' => function () {
                return $this->status === self::STATUS_DEN;
            }, 'whenClient' => "function() {
			    return $('#appointmentschedule-status').val() === '" . self::STATUS_DEN . "';
			}"],
            ['reason_fail', 'required', 'when' => function () {
                return $this->status_service === self::SERVICE_STATUS_KHONG_DONG_Y_LAM;
            }, 'whenClient' => "function() {
			    return $('#appointmentschedule-status_service').val() === '" . self::SERVICE_STATUS_KHONG_DONG_Y_LAM . "';
			}"],
            ['accept_for_service', 'required',  'when' => function () {
                return $this->status_service === self::SERVICE_STATUS_DONG_Y_LAM;
            }, 'whenClient' => "function() {
			    return $('#appointmentschedule-status_service').val() === '" . self::SERVICE_STATUS_DONG_Y_LAM . "';
			}"],
            [['direct_sales_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['direct_sales_id' => 'id']],
            [['co_so_id'], 'exist', 'skipOnError' => true, 'targetClass' => CoSo::class, 'targetAttribute' => ['co_so_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'Title'),
            'customer_id' => Yii::t('backend', 'Customer ID'),
            'co_so_id' => Yii::t('backend', 'Cơ sở'),
            'start_time' => Yii::t('backend', 'Ngày hẹn'),
            'status' => Yii::t('backend', 'Tình trạng'),
            'status_service' => Yii::t('backend', 'Tình trạng dịch vụ'),
            'accept_for_service' => Yii::t('backend', 'Đồng ý dịch vụ nào'),
            'reason_fail' => Yii::t('backend', 'Lý do Fail dù đã đến'),
            'direct_sales_note' => Yii::t('backend', 'Ghi chú của Direct Sales'),
            'direct_sales_id' => Yii::t('backend', 'Direct Sales'),
            'doctor_thamkham_id' => Yii::t('backend', 'Bác sĩ thăm khám'),
            'doctor_thamkham_note' => Yii::t('backend', 'Ghi chú của Bác sĩ thăm khám'),
            'check_in_time' => Yii::t('backend', 'Ngày đến'),
            'description' => Yii::t('backend', 'Description'),
            'created_at' => Yii::t('backend', 'Created At'),
            'created_by' => Yii::t('backend', 'Created By'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'updated_by' => Yii::t('backend', 'Updated By'),
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

    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }

    public function getCoSo()
    {
        return $this->hasOne(CoSo::class, ['id' => 'co_so_id']);
    }

    public function getDirectSales() {
        return $this->hasOne(User::class, ['id' => 'direct_sales_id']);
    }

    public function getDoctorThamkham() {
        return $this->hasOne(User::class, ['id' => 'doctor_thamkham_id']);
    }
}
