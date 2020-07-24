<?php


namespace frontend\controllers;


use frontend\components\MyController;

class SignController extends MyController
{
    public function actionIndex()
    {
        return $this->render('index',[]);
    }
}