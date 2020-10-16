<?php

namespace frontend\models;

use modava\kenne\models\Account;

class Sign extends Account
{
    public $username;
    public $email;
    public $password_hash;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'modava\kenne\models\Account', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'modava\kenne\models\Account', 'message' => 'This email address has already been taken.'],

            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 4],



        ];
    }

    public function signup()
    {
        $user = new Account();
        $user->email = $this->email;
        $user->username = $this->username;
        //$user->password_hash = $this->password_hash;
        $user->setPassword($this->password_hash);
        $user->generateAuthKey();
        return $user->save() ;
    }


}