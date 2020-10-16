<?php

namespace modava\test\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\test\TestModule;
use modava\test\models\table\LocationCountryTable;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "location_country".
*
    * @property int $id
    * @property string $CountryCode
    * @property string $CommonName
    * @property string $slug
    * @property string $FormalName
    * @property string $CountryType
    * @property string $CountrySubType
    * @property string $Sovereignty
    * @property string $Capital
    * @property string $CurrencyCode
    * @property string $CurrencyName
    * @property string $TelephoneCode
    * @property string $CountryCode3
    * @property string $CountryNumber
    * @property string $InternetCountryCode
    * @property int $SortOrder
    * @property int $status
    * @property string $language Language
    * @property string $Flags
    * @property int $IsDeleted
    * @property int $created_at
    * @property int $updated_at
    * @property int $created_by
    * @property int $updated_by
    *
            * @property User $createdBy
            * @property User $updatedBy
            * @property LocationProvince[] $locationProvinces
    */
class LocationCountry extends LocationCountryTable
{
    public $toastr_key = 'location-country';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'slug' => [
                    'class' => SluggableBehavior::class,
                    'immutable' => false,
                    'ensureUnique' => true,
                    'value' => function () {
                        return MyHelper::createAlias($this->id);
                    }
                ],
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
			[['SortOrder', 'status', 'IsDeleted', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
			[['language'], 'string'],
			[['CountryCode', 'CommonName', 'slug', 'FormalName', 'CountryType', 'CountrySubType', 'Sovereignty', 'Capital', 'CurrencyCode', 'CurrencyName', 'TelephoneCode', 'CountryCode3', 'CountryNumber', 'InternetCountryCode', 'Flags'], 'string', 'max' => 255],
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
            'id' => TestModule::t('test', 'ID'),
            'CountryCode' => TestModule::t('test', 'Country Code'),
            'CommonName' => TestModule::t('test', 'Common Name'),
            'slug' => TestModule::t('test', 'Slug'),
            'FormalName' => TestModule::t('test', 'Formal Name'),
            'CountryType' => TestModule::t('test', 'Country Type'),
            'CountrySubType' => TestModule::t('test', 'Country Sub Type'),
            'Sovereignty' => TestModule::t('test', 'Sovereignty'),
            'Capital' => TestModule::t('test', 'Capital'),
            'CurrencyCode' => TestModule::t('test', 'Currency Code'),
            'CurrencyName' => TestModule::t('test', 'Currency Name'),
            'TelephoneCode' => TestModule::t('test', 'Telephone Code'),
            'CountryCode3' => TestModule::t('test', 'Country Code3'),
            'CountryNumber' => TestModule::t('test', 'Country Number'),
            'InternetCountryCode' => TestModule::t('test', 'Internet Country Code'),
            'SortOrder' => TestModule::t('test', 'Sort Order'),
            'status' => TestModule::t('test', 'Status'),
            'language' => TestModule::t('test', 'Language'),
            'Flags' => TestModule::t('test', 'Flags'),
            'IsDeleted' => TestModule::t('test', 'Is Deleted'),
            'created_at' => TestModule::t('test', 'Created At'),
            'updated_at' => TestModule::t('test', 'Updated At'),
            'created_by' => TestModule::t('test', 'Created By'),
            'updated_by' => TestModule::t('test', 'Updated By'),
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
