<?php


namespace frontend\controllers;


use frontend\components\MyController;

class DetailBlogController extends MyController
{
    public function actionIndex(){
        return $this->render('index',[]);
    }
}