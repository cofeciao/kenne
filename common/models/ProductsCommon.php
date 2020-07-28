<?php


namespace common\models;


use modava\categories\models\Categories;
use modava\products\models\table\ProductsTable;

class ProductsCommon extends ProductsTable
{
    public $qtt ;

    public function getCategory(){
        return $this->hasOne(Categories::class,['id'=>"cat_id"]);
    }

    public static function getDetailProduct($slug){
        $data = ProductsCommon::find()->where(['pro_slug'=>$slug]);
        $data = $data->asArray()->one();
        return $data;
    }
}