<?php

namespace modava\categories\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\categories\CategoriesModule;
use modava\categories\models\table\CategoriesTable;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $cat_name
 * @property int $cat_status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Products[] $products
 */
class Categories extends CategoriesTable
{
    public $toastr_key = 'categories';

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                [
                    'class' => SluggableBehavior::class,
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
            [['cat_name'], 'string', 'max' => 255],
            [['cat_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => CategoriesModule::t('categories', 'ID'),
            'cat_name' => CategoriesModule::t('categories', 'Cat Name'),
            'cat_status' => CategoriesModule::t('categories', 'Cat Status'),
            'created_at' => CategoriesModule::t('categories', 'Created At'),
            'updated_at' => CategoriesModule::t('categories', 'Updated At'),
        ];
    }


}
