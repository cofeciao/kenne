<?php

namespace modava\products\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\products\ProductsModule;
use modava\products\models\table\ProductsTable;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "products".
*
    * @property int $id
    * @property string $pro_name
    * @property string $pro_slug
    * @property string $pro_description
    * @property int $pro_quantity
    * @property int $pro_price
    * @property string $pro_image
    * @property int $pro_status
    * @property int $pro_sale
    * @property int $created_at
    * @property int $updated_at
*/
class Products extends ProductsTable
{
    public $toastr_key = 'products';
    public $file;
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                [
                    'class'=>SluggableBehavior::class,
                    'slugAttribute' => 'pro_slug',
                    'ensureUnique' => true,
                    'value' => function () {
                        return MyHelper::createAlias($this->pro_slug);
                    }
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
			[['pro_name'], 'required'],
			[['pro_quantity', 'pro_price', 'pro_status', 'pro_sale'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
			[['pro_name', 'pro_description', 'pro_image'], 'string', 'max' => 255],
            [['file'],'file','extensions'=> 'jpg,png,gif']
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => ProductsModule::t('products', 'ID'),
            'cat_id' => ProductsModule::t('products', 'Id Loại Sp'),
            'pro_name' => ProductsModule::t('products', 'Pro Name'),
            'pro_slug' => ProductsModule::t('products', 'Pro Slug'),
            'pro_description' => ProductsModule::t('products', 'Pro Description'),
            'pro_quantity' => ProductsModule::t('products', 'Pro Quantity'),
            'pro_price' => ProductsModule::t('products', 'Pro Price'),
            'pro_image' => ProductsModule::t('products', 'Pro Image'),
            'pro_status' => ProductsModule::t('products', 'Pro Status'),
            'pro_sale' => ProductsModule::t('products', 'Pro Sale'),
            'created_at' => ProductsModule::t('products', 'Created At'),
            'updated_at' => ProductsModule::t('products', 'Updated At'),
        ];
    }


}
