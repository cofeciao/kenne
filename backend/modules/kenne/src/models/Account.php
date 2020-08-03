<?php

namespace modava\kenne\models;

use common\helpers\MyHelper;
use common\models\User;
use modava\kenne\KenneModule;
use modava\kenne\models\table\AccountTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "account".
*
    * @property int $id
    * @property string $username
    * @property string $auth_key
    * @property string $password_hash
    * @property string $oauth_client
    * @property string $oauth_client_user_id
    * @property string $password_reset_token
    * @property string $email
    * @property int $status
    * @property string $created_at
    * @property string $updated_at
    * @property string $logged_at
    * @property int $created_by
    * @property int $updated_by
*/
class Account extends AccountTable
{
    public $toastr_key = 'account';
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
			[['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
			[['status', 'created_by', 'updated_by'], 'integer'],
			[['created_at', 'updated_at', 'logged_at'], 'safe'],
			[['username', 'password_hash', 'oauth_client', 'oauth_client_user_id', 'password_reset_token', 'email'], 'string', 'max' => 255],
			[['auth_key'], 'string', 'max' => 32],
			[['username'], 'unique'],
			[['email'], 'unique'],
			[['password_reset_token'], 'unique'],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => KenneModule::t('kenne', 'ID'),
            'username' => KenneModule::t('kenne', 'Username'),
            'auth_key' => KenneModule::t('kenne', 'Auth Key'),
            'password_hash' => KenneModule::t('kenne', 'Password Hash'),
            'oauth_client' => KenneModule::t('kenne', 'Oauth Client'),
            'oauth_client_user_id' => KenneModule::t('kenne', 'Oauth Client User ID'),
            'password_reset_token' => KenneModule::t('kenne', 'Password Reset Token'),
            'email' => KenneModule::t('kenne', 'Email'),
            'status' => KenneModule::t('kenne', 'Status'),
            'created_at' => KenneModule::t('kenne', 'Created At'),
            'updated_at' => KenneModule::t('kenne', 'Updated At'),
            'logged_at' => KenneModule::t('kenne', 'Logged At'),
            'created_by' => KenneModule::t('kenne', 'Created By'),
            'updated_by' => KenneModule::t('kenne', 'Updated By'),
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
