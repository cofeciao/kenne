<?php

namespace modava\customer\models;

use common\models\User;
use modava\customer\CustomerModule;
use modava\customer\models\table\CustomerProductTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "customer_product".
*
    * @property int $id
    * @property int $category_id
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
            * @property CustomerProductCategory $category
            * @property User $createdBy
            * @property User $updatedBy
    */
class CustomerProduct extends CustomerProductTable
{
    public $toastr_key = 'customer-product';
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
			[['category_id', 'name'], 'required'],
			[['category_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
			[['price'], 'number'],
			[['language'], 'string'],
			[['name', 'description'], 'string', 'max' => 255],
			[['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerProductCategory::class, 'targetAttribute' => ['category_id' => 'id']],
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
            'id' => Yii::t('backend', 'ID'),
            'category_id' => Yii::t('backend', 'Category ID'),
            'name' => Yii::t('backend', 'Name'),
            'price' => Yii::t('backend', 'Price'),
            'description' => Yii::t('backend', 'Description'),
            'status' => Yii::t('backend', 'Status'),
            'language' => Yii::t('backend', 'Language'),
            'created_at' => Yii::t('backend', 'Created At'),
            'created_by' => Yii::t('backend', 'Created By'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'updated_by' => Yii::t('backend', 'Updated By'),
        ];
    }
}
