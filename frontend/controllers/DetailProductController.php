<?php


namespace frontend\controllers;


use common\models\ProductsCommon;
use frontend\components\MyController;

class DetailProductController extends MyController
{
    public function actionIndex($slug=''){
        $data = ProductsCommon::getDetailProduct($slug);
        return $this->render('index',[
            'data' => $data,
        ]);
    }


}