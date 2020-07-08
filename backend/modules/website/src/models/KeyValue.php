<?php

namespace modava\website\models;

use common\models\User;
use modava\website\WebsiteModule;
use modava\website\models\table\LinkStaticTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "website_key_value".
 *
 * @property int $id
 * @property string $title
 * @property string $key
 * @property string $value
 * @property string $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class KeyValue extends LinkStaticTable
{
    public $toastr_key = 'key-value';

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
            [['title', 'value'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['title', 'value'], 'string', 'max' => 255],
            [['key'], 'string', 'max' => 25],
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
            'key' => WebsiteModule::t('website', 'Key'),
            'value' => WebsiteModule::t('website', 'Value'),
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
