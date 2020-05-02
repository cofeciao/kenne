<?php

namespace modava\article\models;

use Yii;

/**
 * This is the model class for table "article_category".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int|null $parent_id
 * @property string|null $image
 * @property string|null $description
 * @property int|null $position
 * @property string|null $ads_pixel
 * @property string|null $ads_session
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_category';
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
}
