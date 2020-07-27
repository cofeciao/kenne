<?php


namespace frontend\controllers;

use common\models\CategoriesCommon;
use yii\data\Pagination;
use common\models\ProductsCommon;
use frontend\components\MyController;

class ShopController extends  MyController
{
    public function actionIndex($slug=''){
        if ($slug != ''){
            $categories = CategoriesCommon::find()->where(['cat_slug' => $slug])->one();
            $query = $categories->getProducts();
            //Array
            $count = $query->count();
            $pagination = new Pagination(['totalCount'=> $count]);
            $pagination->pageSize = 4;
            $data = $query->offset($pagination->offset)->limit($pagination->limit)->all();
            return $this->render('index',[
                'pagination'=>$pagination,
                'data'=>$data,
            ]);
        }else{
            $query = ProductsCommon::find()->where(['pro_status' => 1]);
            //Activequery
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

    public function actionAddcart($id){
        return $this->renderAjax('cart');
    }
}