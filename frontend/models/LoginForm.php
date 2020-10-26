<?php

namespace frontend\models;

use cheatsheet\Time;
use Codeception\Lib\Interfaces\ActiveRecord;
use yii\base\Model;
use Yii;

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
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }

    public function login()
    {
        if (!$this->validate()) {
            return false;
        }
        $duration = $this->rememberMe ? Time::SECONDS_IN_A_MONTH : 0;
        if (Yii::$app->user->login($this->getUser(), $duration)) {
            return true;
        }
        return false;
    }
}