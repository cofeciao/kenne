<?php

namespace frontend\controllers;

use frontend\models\Products;
use frontend\components\MyController;

class SiteController extends MyController
{
    public function actionIndex()
    {
        $model = new Products();
        $proNew = $model->getProductLimitNumber(6);
        $proBags = $model->getProductsByCategories(7);
        $proShirts =$model->getProductsByCategories(6);
        $proShoes = $model->getProductsByCategories(8);
        return $this->render('index', [
            'data' => $proNew,
            'proBags' => $proBags,
            'proShirts' => $proShirts,
            'proShoes' => $proShoes
        ]);
    }
}
