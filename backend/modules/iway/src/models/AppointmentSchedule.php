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
 * @property int new_appointment_schedule_id
 *
 * @property CoSo $coSo
 * @property User $createdBy
 * @property Customer $customer
 * @property User $updatedBy
 */
class AppointmentSchedule extends AppointmentScheduleTable
{
    const STATUS_DEN = 'den';
    const STATUS_DOI_LICH = 'doi_lich';

    const SERVICE_STATUS_KHONG_DONG_Y_LAM = 'khong_dong_y_lam';
    const SERVICE_STATUS_DONG_Y_LAM = 'dong_y_lam';
    public $toastr_key = 'appointment-schedule';

    public $none_db_new_start_time;

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
            [['customer_id', 'co_so_id', 'direct_sales_id', 'new_appointment_schedule_id', 'doctor_thamkham_id'], 'integer'],
            [['start_time', 'check_in_time'], 'safe'],
            [['description', 'direct_sales_note'], 'string'],
            [['title', 'accept_for_service', 'reason_fail'], 'string', 'max' => 255],
            [['status', 'status_service'], 'string', 'max' => 50],
            [['status_service', 'check_in_time', 'accept_for_service'], 'required', 'when' => function () {
                return $this->status === self::STATUS_DEN;
            }, 'whenClient' => "function() {
			    return $('#appointmentschedule-status').val() === '" . self::STATUS_DEN . "';
			}"],
            ['reason_fail', 'required', 'when' => function () {
                return $this->status_service === self::SERVICE_STATUS_KHONG_DONG_Y_LAM;
            }, 'whenClient' => "function() {
			    return $('#appointmentschedule-status_service').val() === '" . self::SERVICE_STATUS_KHONG_DONG_Y_LAM . "';
			}"],
            [['direct_sales_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['direct_sales_id' => 'id']],
            [['co_so_id'], 'exist', 'skipOnError' => true, 'targetClass' => CoSo::class, 'targetAttribute' => ['co_so_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
            ['none_db_new_start_time', 'required', 'when' => function () {
                return $this->status == 'doi_lich';
            },
                'whenClient' => "function() {
			    return $('#appointmentschedule-status').val() === '" . self::STATUS_DOI_LICH . "';
			}"],
            ['status', 'validateStatus']
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
            'accept_for_service' => Yii::t('backend', 'Dịch vụ quan tâm'),
            'reason_fail' => Yii::t('backend', 'Lý do Fail dù đã đến'),
            'direct_sales_note' => Yii::t('backend', 'Ghi chú của Direct Sales'),
            'direct_sales_id' => Yii::t('backend', 'Direct Sales'),
            'doctor_thamkham_id' => Yii::t('backend', 'Bác sĩ thăm khám'),
            'doctor_thamkham_note' => Yii::t('backend', 'Ghi chú của Bác sĩ thăm khám'),
            'check_in_time' => Yii::t('backend', 'Ngày đến'),
            'description' => Yii::t('backend', 'Ghi chú của Online Sales'),
            'created_at' => Yii::t('backend', 'Created At'),
            'created_by' => Yii::t('backend', 'Created By'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'updated_by' => Yii::t('backend', 'Updated By'),
            'new_appointment_schedule_id' => Yii::t('backend', 'Lịch mới'),
            'none_db_new_start_time' => Yii::t('backend', 'Thời gian lịch mới'),
        ];
    }

    public function validateStatus()
    {
        if ($this->new_appointment_schedule_id) $this->addError('doi_lich', 'Lịch đã dời không thể Cập nhật');
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->createNewAs();
        $this->updateCoSoCustomer();
        parent::afterSave($insert, $changedAttributes);
    }

    public function createNewAs()
    {
        if ($this->status == 'doi_lich') {
            $model = new AppointmentSchedule();

            foreach ($this->getAttributes() as $key => $value) {
                if ($key == 'id') {
                    continue;
                }
                $model->setAttribute($key, $value);
            }

            $model->title .= ' (Mới)';
            $model->start_time = $this->none_db_new_start_time;
            $model->status = 'dat_hen';
            $model->new_appointment_schedule_id = null;
            $model->save();

            $this->new_appointment_schedule_id = $model->primaryKey;
        } else {
            $this->new_appointment_schedule_id = null;
        }

        $this->updateAttributes([
            'new_appointment_schedule_id' => $this->new_appointment_schedule_id
        ]);
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

    public function getDirectSales()
    {
        return $this->hasOne(User::class, ['id' => 'direct_sales_id']);
    }

    public function getDoctorThamkham()
    {
        return $this->hasOne(User::class, ['id' => 'doctor_thamkham_id']);
    }

    public function getNewAppointmentSchedule()
    {
        return $this->hasOne(self::class, ['id' => 'new_appointment_schedule_id']);
    }

    public function updateCoSoCustomer()
    {
        // Nếu lịch hẹn là lịch hẹn cuối cùng thì lưu cơ sở cho KH
        if ($this->co_so_id != $this->customer->co_so_id ) {
            if (self::find()->where(['customer_id' => $this->customer_id])->orderBy(['id' => SORT_DESC])->one()->primaryKey == $this->primaryKey) {
                $customer = Customer::findOne($this->customer_id);
                $customer->co_so_id = $this->co_so_id;
                $customer->save();
            }
        }
    }
}
