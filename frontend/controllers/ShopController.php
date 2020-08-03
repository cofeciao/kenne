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
                //Activequery
                /*$count = $query->count();
                $pagination = new Pagination(['totalCount'=> $count]);
                $pagination->pageSize = 9;
                $data = $query->offset($pagination->offset)->limit($pagination->limit)->all();*/
        }else{
            if (isset($param['slug'])){
               if (isset($param['sort']) && isset($param['slug']) ){
                   $query = $model->getProductByCategory($param['slug']);
                   $query = $model->sortProduct($query,$param['sort']);
               }else{
                   $query = $model->getProductByCategory(current($param));
               }

                /*$query = Categories::find();
               $query = $query->where(['cat_slug' => $slug])->one();
               $query = $query->getProducts();

               //Array
               $count = $query->count();
               $pagination = new Pagination(['totalCount'=> $count]);
               $pagination->pageSize = 6;
               $data = $query->offset($pagination->offset)->limit($pagination->limit)->all();*/
            } elseif(isset($param['key'])){
                $query = $modelSearch->search($param['key']);
                if (isset($param['sort'])){
                    $query = $model->sortProduct($query,$param['sort']);
                }
            }else{
                $query = $model->getAllProducts();
                $query = $model->sortProduct($query,$param['sort']);

            }
        }
        $data = $model->getPagination($query,9);
        return $this->render('index',[
            'data'=>$data,
        ]);
    }

}