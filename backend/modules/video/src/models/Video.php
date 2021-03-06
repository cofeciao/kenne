<?php

namespace modava\video\models;

use common\models\User;
use modava\video\models\table\VideoCategoryTable;
use modava\video\models\table\VideoTypeTable;
use modava\video\VideoModule;
use modava\video\models\table\VideoTable;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use common\helpers\MyHelper;
use yii\db\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Response;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $link
 * @property int $type
 * @property int $video_type
 * @property int $video_category
 * @property string $image
 * @property string $description
 * @property string $content
 * @property int $position
 * @property string $ads_pixel
 * @property string $ads_session
 * @property int $status
 * @property int $views
 * @property string $language
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property VideoCategory $videoCategory
 * @property VideoType $videoType
 * @property User $createdBy
 * @property User $updatedBy
 */
class Video extends VideoTable
{
    public $toastr_key = 'video';

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
            [['title'], 'required'],
            [['type', 'video_type', 'video_category', 'position', 'status', 'views', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['description', 'content', 'ads_pixel', 'ads_session'], 'string'],
            [['title', 'slug', 'link', 'image'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 25],
            [['slug'], 'unique'],
            [['video_category'], 'exist', 'skipOnError' => true, 'targetClass' => VideoCategory::class, 'targetAttribute' => ['video_category' => 'id']],
            [['video_type'], 'exist', 'skipOnError' => true, 'targetClass' => VideoType::class, 'targetAttribute' => ['video_type' => 'id']],
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
            'title' => Yii::t('backend', 'Title'),
            'slug' => Yii::t('backend', 'Slug'),
            'link' => Yii::t('backend', 'Link'),
            'type' => Yii::t('backend', 'Nguồn'),
            'video_type' => Yii::t('backend', 'Video Type'),
            'video_category' => Yii::t('backend', 'Video Category'),
            'image' => Yii::t('backend', 'Image'),
            'description' => Yii::t('backend', 'Description'),
            'content' => Yii::t('backend', 'Content'),
            'position' => Yii::t('backend', 'Position'),
            'ads_pixel' => Yii::t('backend', 'Ads Pixel'),
            'ads_session' => Yii::t('backend', 'Ads Session'),
            'status' => Yii::t('backend', 'Status'),
            'views' => Yii::t('backend', 'Views'),
            'language' => Yii::t('backend', 'Language'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'created_by' => Yii::t('backend', 'Created By'),
            'updated_by' => Yii::t('backend', 'Updated By'),
        ];
    }

    public function actionLoadCategoriesByLang($lang = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ArrayHelper::map(VideoCategoryTable::getAllVideoCategory($lang), 'id', 'title');
    }

    public function actionLoadTypesByLang($lang = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ArrayHelper::map(VideoTypeTable::getAllVideoType($lang), 'id', 'title');
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->on(yii\db\BaseActiveRecord::EVENT_AFTER_INSERT, function (yii\db\AfterSaveEvent $e) {
            if ($this->position == null)
                $this->position = $this->primaryKey;
            $this->save();
        });
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    /**
     * Gets query for [[VideoCAtegory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideoCategory()
    {
        return $this->hasOne(VideoCategory::class, ['id' => 'video_category']);
    }

    /**
     * Gets query for [[VideoType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideoType()
    {
        return $this->hasOne(VideoType::class, ['id' => 'video_type']);
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
