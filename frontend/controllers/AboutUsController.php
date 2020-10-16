<?php


namespace frontend\controllers;


use frontend\components\MyController;

class AboutUsController extends MyController
{
    public function actionIndex()
    {
        return $this->render('index',[]);
    }
}