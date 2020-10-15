<?php

namespace modava\iway\models;

use common\models\User;
use modava\iway\helpers\Utils;
use modava\iway\models\table\CustomerTable;
use modava\location\models\LocationDistrict;
use modava\location\models\LocationProvince;
use modava\location\models\LocationWard;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "iway_customer".
 *
 * @property int $id
 * @property string $code
 * @property string $fullname
 * @property string $avatar
 * @property string $phone
 * @property string $sex
 * @property string $birthday
 * @property string $address
 * @property int $province_id Tỉnh/Thành phố
 * @property int $district_id Quận/Huyện
 * @property int $ward_id Phường/Xã
 * @property string $online_source Nguồn online
 * @property string $fb_fanpage Nếu khách đến từ nguồn FB, thì đến từ Fanpage nào
 * @property string $fb_customer Nếu khách đến từ nguồn FB, thì fb của khách là gì
 * @property int $online_sales_id Sales Online Tư vấn
 * @property string $online_sales_note Ghi chú của Sales Online
 * @property string $status_customer Tình trạng khách hàng: Đặt hẹn, Chờ chăm sóc lại, Fail
 * @property int $co_so_id Cơ sở
 * @property string $reason_fail lý do fail
 * @property string $who_created Người tạo: Lễ tân, Online, Direct, Khác
 * @property string $description
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * // None table fields
 * @property string $text
 *
 * @property AppointmentSchedule[] $iwayAppointmentSchedules
 * @property Call[] $iwayCalls
 * @property CoSo $coSo
 * @property User $createdBy
 * @property User $directSales
 * @property User $onlineSales
 * @property User $updatedBy
 * @property LocationDistrict $district
 * @property LocationProvince $province
 * @property LocationWard $ward
 */
class Customer extends CustomerTable
{
    const PREFIX_CODE = 'IWAY';
    public $toastr_key = 'customer';

    public $none_db_ac_is_create = 0;
    public $none_db_ac_start_time; /* Field ảo, không có ở DB - appointmentschedule-start_time: Thời gian lịch hẹn*/
    public $none_db_ac_title; /* Field ảo, không có ở DB - appointmentschedule-title: Tiêu đề lịch hẹn*/
    public $none_db_ac_note; /* Field ảo, không có ở DB - appointmentschedule-title: ghi chu lịch hẹn*/

    public $none_db_call_is_create = 0;
    public $none_db_call_title; /* Field ảo, không có ở DB - Tiêu đề cuộc gọi*/
    public $none_db_call_start_time; /* Field ảo, không có ở DB - thời gian cuộc gọi*/
    public $none_db_call_note; /* Field ảo, không có ở DB - ghi chú cuộc gọi*/

    public static function getCustomerByKeyWord($keyWord)
    {
        $sql = 'SELECT `id`, concat(fullname, " - ", phone) AS `text` FROM `iway_customer` WHERE fullname LIKE :q OR phone LIKE :q';

        $data = Yii::$app->db->createCommand($sql, [':q' => "%{$keyWord}%"])->queryAll();

        return [
            'results' => $data
        ];
    }

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
                        ActiveRecord::EVENT_BEFORE_INSERT => ['birthday'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['birthday'],
                    ],
                    'value' => function ($event) {
                        return Utils::convertDateToDBFormat($this->birthday);
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
            [['fullname', 'phone', 'online_sales_id', 'status_customer'], 'required'],
            [['birthday'], 'safe'],
            ['phone', 'unique'],
            [['province_id', 'district_id', 'ward_id', 'online_sales_id', 'co_so_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['online_sales_note', 'description'], 'string'],
            [['code', 'fullname', 'avatar', 'sex', 'address', 'fb_fanpage', 'fb_customer', 'reason_fail'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 30],
            [['online_source', 'status_customer', 'who_created'], 'string', 'max' => 50],
            [['co_so_id'], 'exist', 'skipOnError' => true, 'targetClass' => CoSo::class, 'targetAttribute' => ['co_so_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['online_sales_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['online_sales_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => LocationDistrict::class, 'targetAttribute' => ['district_id' => 'id']],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => LocationProvince::class, 'targetAttribute' => ['province_id' => 'id']],
            [['ward_id'], 'exist', 'skipOnError' => true, 'targetClass' => LocationWard::class, 'targetAttribute' => ['ward_id' => 'id']],

            [
                [
                    'none_db_ac_note',
                    'none_db_call_note',
                    'none_db_ac_title',
                    'none_db_call_title',
                    'none_db_ac_is_create',
                    'none_db_call_is_create',
                    'none_db_ac_start_time',
                    'none_db_call_start_time',
                ],
                'safe'
            ],
            [
                [
                    'none_db_ac_start_time',
                    'none_db_ac_title',
                    'co_so_id'
                ],
                'required',
                'when' => function () {
                    return $this->none_db_ac_is_create == 1;
                },
                'whenClient' => "function() {
                    return $('[name=\"Customer[none_db_ac_is_create]\"]').val() == '1';
                }"
            ],
            [
                [
                    'none_db_call_title',
                    'none_db_call_start_time',
                ],
                'required',
                'when' => function () {
                    return $this->none_db_call_is_create == 1;
                },
                'whenClient' => "function() {
                    return $('[name=\"Customer[none_db_call_is_create]\"]').val() == '1';
                }"
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'code' => Yii::t('backend', 'Code'),
            'fullname' => Yii::t('backend', 'Fullname'),
            'avatar' => Yii::t('backend', 'Avatar'),
            'phone' => Yii::t('backend', 'Phone'),
            'sex' => Yii::t('backend', 'Sex'),
            'birthday' => Yii::t('backend', 'Birthday'),
            'address' => Yii::t('backend', 'Address'),
            'province_id' => Yii::t('backend', 'Tỉnh / Tp'),
            'district_id' => Yii::t('backend', 'Quận / Huyện'),
            'ward_id' => Yii::t('backend', 'Phường / Xã'),
            'online_source' => Yii::t('backend', 'Nguồn Online'),
            'fb_fanpage' => Yii::t('backend', 'Fb Fanpage'),
            'fb_customer' => Yii::t('backend', 'Fb Customer'),
            'online_sales_id' => Yii::t('backend', 'Online Sales'),
            'online_sales_note' => Yii::t('backend', 'Online Sales Note'),
            'direct_sales_id' => Yii::t('backend', 'Direct Sales'),
            'status_customer' => Yii::t('backend', 'Status Customer'),
            'co_so_id' => Yii::t('backend', 'Cơ sở'),
            'reason_fail' => Yii::t('backend', 'Lý do Fail'),
            'who_created' => Yii::t('backend', 'Who Created'),
            'description' => Yii::t('backend', 'Description'),
            'created_at' => Yii::t('backend', 'Created At'),
            'created_by' => Yii::t('backend', 'Created By'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'updated_by' => Yii::t('backend', 'Updated By'),
            'none_db_call_title' => Yii::t('backend', 'Tiêu đề (Cuộc gọi)'),
            'none_db_call_start_time' => Yii::t('backend', 'Thời gian gọi (Cuộc gọi)'),
            'none_db_call_note' => Yii::t('backend', 'Ghi chú (Cuộc gọi)'),
            'none_db_ac_start_time' => Yii::t('backend', 'Ngày hẹn (Lịch hẹn)'),
            'none_db_ac_title' => Yii::t('backend', 'Tiêu đề (Lịch hẹn)'),
            'none_db_ac_note' => Yii::t('backend', 'Ghi chú (Lịch hẹn)'),
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->createCustomerCode();
        $this->createAppointmentSchedule();
        $this->createCall();
        parent::afterSave($insert, $changedAttributes);
    }

    /* Nếu KH chuyển cơ sở thì vẫn giữ cơ sở cũ của KH cho code */
    public function createCustomerCode() {
        if (!$this->code && $this->co_so_id) {
            $this->updateAttributes([
                'code' => self::PREFIX_CODE . str_pad($this->coSo->primaryKey, 2, 0, STR_PAD_LEFT) . '-' . $this->primaryKey
            ]);
        }
    }

    public function createAppointmentSchedule()
    {
        if ($this->none_db_ac_is_create != 1) return;

        $apS = new AppointmentSchedule();
        $apS->title = $this->none_db_ac_title;
        $apS->start_time = $this->none_db_ac_start_time;
        $apS->co_so_id = $this->co_so_id;
        $apS->customer_id = $this->primaryKey;
        $apS->status = 'dat_hen';
        $apS->description = $this->none_db_ac_note;
        $apS->save();
    }

    public function createCall()
    {
        if ($this->none_db_call_is_create != 1) return;

        $call = new Call();
        $call->title = $this->none_db_call_title;
        $call->start_time = $this->none_db_call_start_time;
        $call->status = 'len_ke_hoach';
        $call->customer_id = $this->primaryKey;
        $call->description = $this->none_db_call_note;
        $call->save();
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
    public function getOnlineSales()
    {
        return $this->hasOne(User::class, ['id' => 'online_sales_id']);
    }

    public function getCoSo()
    {
        return $this->hasOne(CoSo::class, ['id' => 'co_so_id']);
    }

    public function getProvince()
    {
        return $this->hasOne(LocationProvince::class, ['id' => 'province_id']);
    }

    public function getDistrict()
    {
        return $this->hasOne(LocationDistrict::class, ['id' => 'district_id']);
    }

    public function getWard()
    {
        return $this->hasOne(LocationWard::class, ['id' => 'ward_id']);
    }
}
