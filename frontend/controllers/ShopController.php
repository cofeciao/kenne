<?php


namespace frontend\controllers;

use frontend\models\Products;
use frontend\components\MyController;
use frontend\models\ProductsSearch;

class ShopController extends  MyController
{
    public function actionIndex(){
        $data = '';
        $model = new Products();
        $modelSearch = new ProductsSearch();
        $param = \Yii::$app->request->queryParams;

        if (empty($param)){
                $query = $model->getAllProducts();
                $data = $model->getPagination($query,9);
                //Activequery
                /*$count = $query->count();
                $pagination = new Pagination(['totalCount'=> $count]);
                $pagination->pageSize = 9;
                $data = $query->offset($pagination->offset)->limit($pagination->limit)->all();*/
        }else{
            if (key($param) == 'slug'){
                $query = $model->getProductByCategory(current($param));
                /*$query = Categories::find();
               $query = $query->where(['cat_slug' => $slug])->one();
               $query = $query->getProducts();

               //Array
               $count = $query->count();
               $pagination = new Pagination(['totalCount'=> $count]);
               $pagination->pageSize = 6;
               $data = $query->offset($pagination->offset)->limit($pagination->limit)->all();*/
            }else{
                $query = $modelSearch->search(\Yii::$app->request->queryParams['key']);
            }
            $data = $model->getPagination($query,6);
        }
        return $this->render('index',[
            'data'=>$data,
        ]);
    }

}