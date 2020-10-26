<?php

namespace frontend\controllers;

use common\helpers\MyHelper;
use frontend\models\Products;
use frontend\components\MyController;

class ShopController extends  MyController
{
    public function actionIndex(){

        $data = '';
        $model = new Products();
        $param = \Yii::$app->request->queryParams;

        if (empty($param) || isset($param['sort'])){
                if (isset($param['sort'])){
                    $query = $model->getAllProducts();
                    $query = $model->sortProduct($query,$param['sort']);
                }
                else
                {
                    $query = $model->getAllProducts();
                }
                //Activequery
                /*$count = $query->count();
                $pagination = new Pagination(['totalCount'=> $count]);
                $pagination->pageSize = 9;
                $data = $query->offset($pagination->offset)->limit($pagination->limit)->all();*/
        }else {
            if (isset($param['slug'])){
                if (isset($param['sort']) && isset($param['slug']) ){
                    $query = $model->getProductByCategory($param['slug']);
                    $query = $model->sortProduct($query,$param['sort']);
                }else{
                    $query = $model->getProductByCategory(current($param));
                }
            }
            elseif(isset($param['key'])){
                $param1 = MyHelper::createAlias($param['key']);
                $query = $model->search($param1);
                if (isset($param['sort'])) {
                    $query = $model->sortProduct($query, $param['sort']);
                }
            }else{
                    $query = $model->getAllProducts();
                    if (isset($param['sort'])) {
                        $query = $model->sortProduct($query, $param['sort']);
                    }
                }
        }
        $data = $model->getPagination($query,6);
        return $this->render('index',[
            'data'=>$data,
        ]);
    }
}