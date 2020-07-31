<?php

namespace frontend\models;

use modava\categories\models\Categories;
use modava\products\models\table\ProductsTable;
use yii\data\ActiveDataProvider;

class Products extends ProductsTable
{
    public $qtt ;

    public function getCategory(){
        return $this->hasOne(Categories::class,['id'=>"cat_id"]);
    }

    public static function getDetailProduct($slug){
        $data = self::find()->where(['pro_slug'=>$slug]);
        $data = $data->asArray()->one();
        return $data;
    }

    public function getProductsByCategories($id = null){
        $query = Products::find()->where(['cat_id' => $id]);

        return $query->all();
    }

    public function getProductLimitNumber($limit = null) {
        $query = Products::find()->orderBy('id');

        if ($limit != null) {
            $query->limit($limit);
        }

        return $query->all();
    }

    public function getAllProducts(){
        $query = self::find()->where(['pro_status' => self::ACTIVE_STATUS]);
        return $query;
    }

    public function getProductByCategory($slug){
        $model = new \frontend\models\Categories();
        $query = $model->find();
        $query = $query->where(['cat_slug' => $slug])->one();
        $data = $query->getProducts();
        return $data;
    }

    public function getPagination($query,$pageSize = 6){
        $data = new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'pageSize'=>$pageSize,
                'totalCount'=> $query->count(),
            ]
        ]);
        return $data;
    }
}