<?php

namespace modava\video\models;

use common\models\User;
use modava\video\VideoModule;
use modava\video\models\table\VideoTypeTable;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use common\helpers\MyHelper;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "video_type".
*
    * @property int $id
    * @property string $title
    * @property string $slug
    * @property string $image
    * @property string $description
    * @property int $position
    * @property string $ads_pixel
    * @property string $ads_session
    * @property int $status
    * @property string $language
    * @property int $created_at
    * @property int $updated_at
    * @property int $created_by
    * @property int $updated_by
    *
            * @property Video[] $videos
            * @property User $updatedBy
            * @property User $createdBy
    */
class VideoType extends VideoTypeTable
{
    public $toastr_key = 'video-type';
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
			[['title', 'slug', 'created_at', 'updated_at'], 'required'],
			[['position', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
			[['ads_pixel', 'ads_session'], 'string'],
			[['title', 'slug', 'image', 'description'], 'string', 'max' => 255],
			[['language'], 'string', 'max' => 2],
			[['slug'], 'unique'],
			[['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
			[['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => VideoModule::t('video', 'ID'),
            'title' => VideoModule::t('video', 'Title'),
            'slug' => VideoModule::t('video', 'Slug'),
            'image' => VideoModule::t('video', 'Image'),
            'description' => VideoModule::t('video', 'Description'),
            'position' => VideoModule::t('video', 'Position'),
            'ads_pixel' => VideoModule::t('video', 'Ads Pixel'),
            'ads_session' => VideoModule::t('video', 'Ads Session'),
            'status' => VideoModule::t('video', 'Status'),
            'language' => VideoModule::t('video', 'Language'),
            'created_at' => VideoModule::t('video', 'Created At'),
            'updated_at' => VideoModule::t('video', 'Updated At'),
            'created_by' => VideoModule::t('video', 'Created By'),
            'updated_by' => VideoModule::t('video', 'Updated By'),
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
