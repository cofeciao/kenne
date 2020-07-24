<?php


namespace frontend\controllers;


use frontend\components\MyController;

class ShopController extends  MyController
{
    public function actionIndex(){
        return $this->render('index',[]);
    }
}