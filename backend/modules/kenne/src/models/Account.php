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

            ]
        );
    }

    /**
    * {@inheritdoc}
    */
    public function rules()
    {
        return [
			[['password', 'email', 'first_name','last_name'], 'required'],
			[['status'], 'integer'],
            [['password' , 'confirm_password'], 'string', 'min' => 6 , 'max' => 10],
			[['email'], 'string', 'max' => 255],
			[['auth_key','access_token','first_name','last_name'], 'string', 'max' => 32],
			[['email'], 'unique'],
			[['access_token'], 'unique'],
            array('password', 'compare', 'compareAttribute'=> 'confirm_password' , 'message' => "password không trùng khớp"),
		];
    }


    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => KenneModule::t('kenne', 'ID'),
            'auth_key' => KenneModule::t('kenne', 'Auth Key'),
            'access_token' => KenneModule::t('kenne', 'Password Reset Token'),
            'email' => KenneModule::t('kenne', 'Email'),
            'status' => KenneModule::t('kenne', 'Status'),
            'first_name' => KenneModule::t('kenne', 'First name'),
            'last_name' => KenneModule::t('kenne', 'Last name'),
        ];
    }

    /**
    * Gets query for [[User]].
    *
    * @return \yii\db\ActiveQuery
    */
    public function getUserCreated()
    {
//        return $this->hasOne(User::class, ['id' => 'created_by']);
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

    public function getLogin($email,$password)
    {
        $dong = self::find()->where(['email' => $email, 'password' => $password])->count();
        if($dong == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
