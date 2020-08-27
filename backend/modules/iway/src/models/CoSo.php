<?php

namespace modava\iway\models;

use common\models\User;
use modava\iway\IwayModule;
use modava\iway\models\table\CoSoTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "iway_co_so".
*
    * @property int $id
    * @property string $name
    * @property string $address
    * @property string $phone
    * @property string $email
    * @property string $description
    * @property int $status 0:disabled, 1:activated
    * @property string $language Language
    * @property int $created_at
    * @property int $updated_at
    * @property int $created_by
    * @property int $updated_by
    *
            * @property User $createdBy
            * @property User $updatedBy
            * @property IwayOrder[] $iwayOrders
            * @property IwayPayment[] $iwayPayments
            * @property IwayTreatmentSchedule[] $iwayTreatmentSchedules
    */
class CoSo extends CoSoTable
{
    public $toastr_key = 'co-so';
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
            ]
        );
    }

    /**
    * {@inheritdoc}
    */
    public function rules()
    {
        return [
			[['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
			[['language'], 'string'],
			[['name', 'address', 'phone', 'email', 'description'], 'string', 'max' => 255],
			[['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
			[['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => IwayModule::t('iway', 'ID'),
            'name' => IwayModule::t('iway', 'Name'),
            'address' => IwayModule::t('iway', 'Address'),
            'phone' => IwayModule::t('iway', 'Phone'),
            'email' => IwayModule::t('iway', 'Email'),
            'description' => IwayModule::t('iway', 'Description'),
            'status' => IwayModule::t('iway', 'Status'),
            'language' => IwayModule::t('iway', 'Language'),
            'created_at' => IwayModule::t('iway', 'Created At'),
            'updated_at' => IwayModule::t('iway', 'Updated At'),
            'created_by' => IwayModule::t('iway', 'Created By'),
            'updated_by' => IwayModule::t('iway', 'Updated By'),
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
