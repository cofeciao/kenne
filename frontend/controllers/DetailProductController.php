<?php


namespace frontend\controllers;


use frontend\components\MyController;

class DetailProductController extends MyController
{
    public function actionIndex(){
        return $this->render('index',[]);
    }
}