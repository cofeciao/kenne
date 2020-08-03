<?php

namespace frontend\controllers;

use frontend\components\MyController;
use frontend\models\Logo;
use Yii;

class AccountController extends MyController
{
    public function actionIndex(){
        return $this->render('index',[

        ]);
    }
}