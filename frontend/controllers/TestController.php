<?php


namespace frontend\controllers;


use frontend\components\MyController;
use frontend\models\Products;

class TestController extends  MyController
{
    public function actionIndex(){
       // return $this->render('index');
        $data = Products::find()
            ->where(['!=','pro_sale', 0])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(1)->all();
       return $this->render('@common/mail/layouts/html',[
           'data'=>$data
       ]);
    }


}