<?php

namespace frontend\controllers;

use common\models\ProductsCommon;
use frontend\components\MyController;


class SiteController extends MyController
{

    public function actionIndex()
    {
        $proNew = ProductsCommon::find()->orderBy('id')->offset(0)->limit(6)->all();
        $proBags = ProductsCommon::find()->where(['cat_id' => 7 ])->all();
        $proShirts = ProductsCommon::find()->where(['cat_id' => 6 ])->all();
        $proShoes = ProductsCommon::find()->where(['cat_id' => 8 ])->all();
        return $this->render('index', [
            'data'=>$proNew,
            'proBags'=>$proBags,
            'proShirts'=>$proShirts,
            'proShoes'=>$proShoes
        ]);
    }


}
