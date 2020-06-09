<?php

namespace modava\social\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\social\SocialModule;
use modava\social\models\table\SocialAgencyTable;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "social_agency".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property int $status
 * @property string $language Language
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property SocialOrigin[] $origins
 */
class SocialAgency extends SocialAgencyTable
{
    public $toastr_key = 'social-agency';

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
                'slug' => [
                    'class' => SluggableBehavior::class,
                    'immutable' => false,
                    'ensureUnique' => true,
                    'value' => function () {
                        return MyHelper::createAlias($this->name);
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
            [['name'], 'required'],
            [['description', 'language'], 'string'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
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
            'id' => SocialModule::t('social', 'ID'),
            'name' => SocialModule::t('social', 'Name'),
            'slug' => SocialModule::t('social', 'Slug'),
            'description' => SocialModule::t('social', 'Description'),
            'status' => SocialModule::t('social', 'Status'),
            'language' => SocialModule::t('social', 'Language'),
            'created_at' => SocialModule::t('social', 'Created At'),
            'updated_at' => SocialModule::t('social', 'Updated At'),
            'created_by' => SocialModule::t('social', 'Created By'),
            'updated_by' => SocialModule::t('social', 'Updated By'),
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
