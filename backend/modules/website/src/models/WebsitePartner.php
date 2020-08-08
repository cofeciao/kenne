<?php

namespace modava\website\models;

use common\models\User;
use modava\website\WebsiteModule;
use modava\website\models\table\WebsitePartnerTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "website_partner".
*
    * @property int $id
    * @property string $title
    * @property string $image
    * @property string $link
    * @property int $status
    * @property string $language
    * @property int $created_at
    * @property int $updated_at
    * @property int $created_by
    * @property int $updated_by
    *
            * @property User $createdBy
            * @property User $updatedBy
    */
class WebsitePartner extends WebsitePartnerTable
{
    public $toastr_key = 'website-partner';
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
			[['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
			[['title', 'image', 'link'], 'string', 'max' => 255],
			[['language'], 'string', 'max' => 25],
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
            'id' => WebsiteModule::t('website', 'ID'),
            'title' => WebsiteModule::t('website', 'Title'),
            'image' => WebsiteModule::t('website', 'Image'),
            'link' => WebsiteModule::t('website', 'Link'),
            'status' => WebsiteModule::t('website', 'Status'),
            'language' => WebsiteModule::t('website', 'Language'),
            'created_at' => WebsiteModule::t('website', 'Created At'),
            'updated_at' => WebsiteModule::t('website', 'Updated At'),
            'created_by' => WebsiteModule::t('website', 'Created By'),
            'updated_by' => WebsiteModule::t('website', 'Updated By'),
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
