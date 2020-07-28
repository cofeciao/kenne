<?php


namespace frontend\controllers;

use common\models\CategoriesCommon;
use yii\data\Pagination;
use common\models\ProductsCommon;
use frontend\components\MyController;

class ShopController extends  MyController
{
    public function actionIndex($slug=''){

        $query = CategoriesCommon::find();
        if ($slug != ''){
            $query = $query->where(['cat_slug' => $slug])->one();
            $query = $query->getProducts();
            //Array
            $count = $query->count();
            $pagination = new Pagination(['totalCount'=> $count]);
            $pagination->pageSize = 4;
            $data = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        }else{
            $query = ProductsCommon::find()->where(['pro_status' => 1]);
            //Activequery
            $count = $query->count();
            $pagination = new Pagination(['totalCount'=> $count]);
            $pagination->pageSize = 7;
            $data = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        }
        $pagination = 0;
        $data = '';
        return $this->render('index',[
            'pagination'=>$pagination,
            'data'=>$data,
        ]);
    }

}