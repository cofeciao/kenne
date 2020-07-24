<?php


namespace frontend\controllers;


use frontend\components\MyController;

class BlogController extends MyController
{
    public function actionIndex()
    {
        return $this->render('index',[]);
    }
}