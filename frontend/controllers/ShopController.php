<?php


namespace frontend\controllers;

use yii\data\Pagination;
use common\models\ProductsCommon;
use frontend\components\MyController;

class ShopController extends  MyController
{
    public function actionIndex(){
        $query = ProductsCommon::find()->where(['pro_status' => 1]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount'=> $count]);
        $pagination->pageSize = 7;
        $data = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('index',[
            'pagination'=>$pagination,
            'data'=>$data,
        ]);
    }
}