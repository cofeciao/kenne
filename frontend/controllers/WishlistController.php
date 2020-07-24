<?php


namespace frontend\controllers;


use frontend\components\MyController;

class WishlistController extends MyController
{
    public function actionIndex()
    {
        return $this->render('index',[]);
    }
}