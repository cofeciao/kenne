<?php


namespace frontend\controllers;


use frontend\components\MyController;

class CartController extends MyController
{
    public function actionIndex()
    {
        return $this->render('index',[]);
    }
}