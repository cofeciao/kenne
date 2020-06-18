<?php

namespace modava\customer\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\customer\CustomerModule;
use modava\customer\models\table\CustomerTreatmentScheduleTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "customer_treatment_schedule".
*
    * @property int $id
    * @property int $order_id
    * @property int $co_so Lịch điều trị lập ở cơ sở nào
    * @property int $time_start Thời gian bắt đầu
    * @property int $time_end Thời gian kết thúc
    * @property string $note Ghi chú điều trị
    * @property int $created_at
    * @property int $updated_at
    * @property int $created_by
    * @property int $updated_by
    *
            * @property SettingCoSo $coSo
            * @property User $createdBy
            * @property CustomerOrder $order
            * @property User $updatedBy
    */
class CustomerTreatmentSchedule extends CustomerTreatmentScheduleTable
{
    public $toastr_key = 'customer-treatment-schedule';
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
			[['order_id'], 'required'],
			[['order_id', 'co_so', 'time_start', 'time_end', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
			[['note'], 'string', 'max' => 500],
			[['co_so'], 'exist', 'skipOnError' => true, 'targetClass' => SettingCoSo::class, 'targetAttribute' => ['co_so' => 'id']],
			[['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
			[['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerOrder::class, 'targetAttribute' => ['order_id' => 'id']],
			[['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => CustomerModule::t('customer', 'ID'),
            'order_id' => CustomerModule::t('customer', 'Order ID'),
            'co_so' => CustomerModule::t('customer', 'Co So'),
            'time_start' => CustomerModule::t('customer', 'Time Start'),
            'time_end' => CustomerModule::t('customer', 'Time End'),
            'note' => CustomerModule::t('customer', 'Note'),
            'created_at' => CustomerModule::t('customer', 'Created At'),
            'updated_at' => CustomerModule::t('customer', 'Updated At'),
            'created_by' => CustomerModule::t('customer', 'Created By'),
            'updated_by' => CustomerModule::t('customer', 'Updated By'),
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
