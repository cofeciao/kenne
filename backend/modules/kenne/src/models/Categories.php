<?php

namespace modava\kenne\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\kenne\KenneModule;
use modava\kenne\models\table\CategoriesTable;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "categories".
*
    * @property int $id
    * @property string $cat_slug
    * @property string $cat_name
    * @property int $cat_status
    * @property string $created_at
    * @property string $updated_at
    *
            * @property Products[] $products
    */
class Categories extends CategoriesTable
{
    const ACTIVE_STATUS = 1;
    const DISABLE_STATUS = 0;
    public $toastr_key = 'categories';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                [
                    'class' => SluggableBehavior::className(),
                    'ensureUnique' => true,
                    'slugAttribute'=>'cat_slug',
                    'value' => function () {
                        return MyHelper::createAlias($this->cat_name);
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
			[['cat_name'], 'required'],
			[['cat_status'], 'integer'],
			[['created_at', 'updated_at'], 'safe'],
			[['cat_slug', 'cat_name'], 'string', 'max' => 255],
			[['cat_name'], 'unique'],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => KenneModule::t('kenne', 'ID'),
            'cat_slug' => KenneModule::t('kenne', 'Cat Slug'),
            'cat_name' => KenneModule::t('kenne', 'Cat Name'),
            'cat_status' => KenneModule::t('kenne', 'Cat Status'),
            'created_at' => KenneModule::t('kenne', 'Created At'),
            'updated_at' => KenneModule::t('kenne', 'Updated At'),
        ];
    }


}
