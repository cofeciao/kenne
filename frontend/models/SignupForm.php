<?php


namespace frontend\models;

use frontend\models\Account;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $email;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\frontend\models\Account', 'message' => 'Username đã được đăng ký.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\frontend\models\Account', 'message' => 'Email Username đã được đăng ký.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 8],
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new Account();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save();

    }
}