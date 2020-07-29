<?php


namespace frontend\controllers;

use frontend\models\Products;
use frontend\components\MyController;

class ShopController extends  MyController
{
    public function actionIndex($slug=''){
        $data = '';
        $model = new Products();
        if ($slug != ''){
            $query = $model->getProductByCategory($slug);
            $data = $model->getPagination($query,6);
            /*$query = Categories::find();
            $query = $query->where(['cat_slug' => $slug])->one();
            $query = $query->getProducts();

            //Array
            $count = $query->count();
            $pagination = new Pagination(['totalCount'=> $count]);
            $pagination->pageSize = 6;
            $data = $query->offset($pagination->offset)->limit($pagination->limit)->all();*/
        }else{
            $query = $model->getAllProducts();
            $data = $model->getPagination($query,9);
            //Activequery
            /*$count = $query->count();
            $pagination = new Pagination(['totalCount'=> $count]);
            $pagination->pageSize = 9;
            $data = $query->offset($pagination->offset)->limit($pagination->limit)->all();*/
        }
        return $this->render('index',[
            'data'=>$data,
        ]);
    }
}