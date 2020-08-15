<?php

namespace frontend\models;

use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $toastr_key = 'login';

    private $_user;

    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'validatePassword'],
            ['password', 'required'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Account::findByUsername($this->username);
        }
        return $this->_user;
    }

    public function login()
    {
        if ($this->validate()) {
            return \Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }
}