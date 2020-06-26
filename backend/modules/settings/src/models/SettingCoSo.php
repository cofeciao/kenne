<?php

namespace modava\settings\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\settings\SettingsModule;
use modava\settings\models\table\SettingCoSoTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "setting_co_so".
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
    */
class SettingCoSo extends SettingCoSoTable
{
    public $toastr_key = 'setting-co-so';
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
            'id' => SettingsModule::t('settings', 'ID'),
            'name' => SettingsModule::t('settings', 'Name'),
            'address' => SettingsModule::t('settings', 'Address'),
            'phone' => SettingsModule::t('settings', 'Phone'),
            'email' => SettingsModule::t('settings', 'Email'),
            'description' => SettingsModule::t('settings', 'Description'),
            'status' => SettingsModule::t('settings', 'Status'),
            'language' => SettingsModule::t('settings', 'Language'),
            'created_at' => SettingsModule::t('settings', 'Created At'),
            'updated_at' => SettingsModule::t('settings', 'Updated At'),
            'created_by' => SettingsModule::t('settings', 'Created By'),
            'updated_by' => SettingsModule::t('settings', 'Updated By'),
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
