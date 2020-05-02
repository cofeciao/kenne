<?php

namespace modava\article\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use common\models\UserProfile;
use modava\article\models\query\ArticleCategoryQuery;

/**
 * This is the model class for table "article_category".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $parent_id
 * @property string $image
 * @property string $description
 * @property int $position
 * @property string $ads_pixel
 * @property string $ads_session
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    const STATUS_DISABLED = 0;
    const STATUS_PUBLISHED = 1;

    public static function tableName()
    {
        return 'article_category';
    }

    public function behaviors()
    {
        return [
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
            ]
        ];
    }

    public static function find()
    {
        return new ArticleCategoryQuery(get_called_class());
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'created_at', 'updated_at'], 'required'],
            [['parent_id', 'position', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['ads_pixel', 'ads_session'], 'string'],
            [['title', 'slug', 'image', 'description'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('article', 'ID'),
            'title' => Yii::t('article', 'Title'),
            'slug' => Yii::t('article', 'Slug'),
            'parent_id' => Yii::t('article', 'Parent ID'),
            'image' => Yii::t('article', 'Image'),
            'description' => Yii::t('article', 'Description'),
            'position' => Yii::t('article', 'Position'),
            'ads_pixel' => Yii::t('article', 'Ads Pixel'),
            'ads_session' => Yii::t('article', 'Ads Session'),
            'status' => Yii::t('article', 'Status'),
            'created_at' => Yii::t('article', 'Created At'),
            'updated_at' => Yii::t('article', 'Updated At'),
            'created_by' => Yii::t('article', 'Created By'),
            'updated_by' => Yii::t('article', 'Updated By'),
        ];
    }

    public function getUserCreatedBy($id)
    {
        if ($id == null && is_integer($id))
            return null;
        $user = UserProfile::find()->where(['user_id' => $id])->one();
        return $user != null ? $user : null;
    }

    public function getUserUpdatedBy($id)
    {
        if ($id == null && is_integer($id))
            return null;
        $user = UserProfile::find()->where(['user_id' => $id])->one();
        return $user != null ? $user : null;
    }

}
