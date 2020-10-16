<?php

namespace modava\kenne\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\kenne\KenneModule;
use modava\kenne\models\table\ProductsTable;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "products".
*
    * @property int $id
    * @property int $cat_id
    * @property string $pro_name
    * @property string $pro_slug
    * @property string $pro_description
    * @property int $pro_quantity
    * @property int $pro_price
    * @property string $pro_image
    * @property int $pro_status
    * @property int $pro_sale
    * @property int $pro_number số lần bán được sản phẩm
    * @property string $created_at
    * @property string $updated_at
    *
            * @property Orders[] $orders
            * @property Categories $cat
    */
class Products extends ProductsTable
{
    const ACTIVE_STATUS = 1;
    const DISABLE_STATUS = 0;
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

    public function getNewProductSale(){
        $query = self::find()
            ->where(['!=','pro_sale', 0])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(1);
        return $query->all();
    }

    public function rules()
    {
        return [
            [['pro_name','pro_slug'],'unique'],
			[['cat_id', 'pro_name', 'pro_slug'], 'required'],
			[['cat_id', 'pro_quantity', 'pro_price', 'pro_status', 'pro_sale', 'pro_number'], 'integer'],
			[['created_at', 'updated_at'], 'safe'],
			[['pro_name', 'pro_slug', 'pro_description', 'pro_image'], 'string', 'max' => 255],
			[['pro_slug'], 'unique'],
			[['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['cat_id' => 'id']],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => KenneModule::t('kenne', 'ID'),
            'cat_id' => KenneModule::t('kenne', 'Cat ID'),
            'pro_name' => KenneModule::t('kenne', 'Pro Name'),
            'pro_slug' => KenneModule::t('kenne', 'Pro Slug'),
            'pro_description' => KenneModule::t('kenne', 'Pro Description'),
            'pro_quantity' => KenneModule::t('kenne', 'Pro Quantity'),
            'pro_price' => KenneModule::t('kenne', 'Pro Price'),
            'pro_image' => KenneModule::t('kenne', 'Pro Image'),
            'pro_status' => KenneModule::t('kenne', 'Pro Status'),
            'pro_sale' => KenneModule::t('kenne', 'Pro Sale'),
            'pro_number' => KenneModule::t('kenne', 'Pro Number'),
            'created_at' => KenneModule::t('kenne', 'Created At'),
            'updated_at' => KenneModule::t('kenne', 'Updated At'),
        ];
    }


}
