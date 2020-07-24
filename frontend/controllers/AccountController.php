<?php


namespace frontend\controllers;


use frontend\components\MyController;

class AccountController extends MyController
{
    public function actionIndex(){
        return $this->render('index',[]);
    }
}