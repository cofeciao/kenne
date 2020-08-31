<?php

namespace modava\iway\models;

use common\models\User;
use modava\iway\IwayModule;
use modava\iway\models\table\ProductTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "iway_product".
*
    * @property int $id
    * @property string $category
    * @property string $name
    * @property double $price Đơn giá
    * @property string $description Mô tả sản phẩm
    * @property int $status 0: disabled, 1: published
    * @property string $language Language
    * @property int $created_at
    * @property int $created_by
    * @property int $updated_at
    * @property int $updated_by
    *
            * @property OrderDetail[] $iwayOrderDetails
            * @property User $createdBy
            * @property User $updatedBy
    */
class Product extends ProductTable
{
    public $toastr_key = 'product';
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
			[['category', 'name'], 'required'],
			[['status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
			[['price'], 'number'],
			[['language'], 'string'],
			[['name', 'description'], 'string', 'max' => 255],
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
            'category' => IwayModule::t('iway', 'Category'),
            'name' => IwayModule::t('iway', 'Name'),
            'price' => IwayModule::t('iway', 'Price'),
            'description' => IwayModule::t('iway', 'Description'),
            'status' => IwayModule::t('iway', 'Status'),
            'language' => IwayModule::t('iway', 'Language'),
            'created_at' => IwayModule::t('iway', 'Created At'),
            'created_by' => IwayModule::t('iway', 'Created By'),
            'updated_at' => IwayModule::t('iway', 'Updated At'),
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
