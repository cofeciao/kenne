<?php


namespace frontend\controllers;


use frontend\components\MyController;
use frontend\models\Products;
use modava\product\models\Product;

class DetailProductController extends MyController
{
    public function actionIndex($slug = ''){
        $model = new Products();
        $data = $model->getDetailProduct($slug);
        $dataBestSeller = $model->getBestSellerProduct();
        return $this->render('index',[
            'data' => $data,
            'dataBestSeller'=>$dataBestSeller
        ]);
    }
}