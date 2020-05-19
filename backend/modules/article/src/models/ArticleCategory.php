<?php

namespace modava\article\models;

use common\models\User;
use modava\article\ArticleModule;
use modava\article\models\table\ActicleCategoryTable;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use common\helpers\MyHelper;
use yii\db\ActiveRecord;
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
 * @property string $language Language
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class ArticleCategory extends ActicleCategoryTable
{
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
                        return MyHelper::createAlias($this->title);
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
            ]);
    }


    public function afterSave($insert, $changedAttributes)
    {
        $this->on(yii\db\BaseActiveRecord::EVENT_AFTER_INSERT, function (yii\db\AfterSaveEvent $e) {
            $this->position = $this->primaryKey;
            $this->save();
        });
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'language'], 'required'],
            [['parent_id', 'position', 'status',], 'integer'],
            [['ads_pixel', 'ads_session', 'language'], 'string'],
            ['language','in','range'=>['vi','en','jp'],'strict'=>false],
            [['title', 'slug', 'image', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => ArticleModule::t('article', 'ID'),
            'title' => ArticleModule::t('article', 'Title'),
            'slug' => ArticleModule::t('article', 'Slug'),
            'parent_id' => ArticleModule::t('article', 'Parent ID'),
            'image' => ArticleModule::t('article', 'Image'),
            'description' => ArticleModule::t('article', 'Description'),
            'position' => ArticleModule::t('article', 'Position'),
            'ads_pixel' => ArticleModule::t('article', 'Ads Pixel'),
            'ads_session' => ArticleModule::t('article', 'Ads Session'),
            'status' => ArticleModule::t('article', 'Status'),
            'language' => ArticleModule::t('article', 'Language'),
            'created_at' => ArticleModule::t('article', 'Created At'),
            'updated_at' => ArticleModule::t('article', 'Updated At'),
            'created_by' => ArticleModule::t('article', 'Created By'),
            'updated_by' => ArticleModule::t('article', 'Updated By'),
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
