<?php


namespace common\models;


use modava\categories\models\Categories;
use modava\products\models\Products;
use yii\db\ActiveRecord;

class ProductsCommon extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }

    public function getCategory(){
        return $this->hasOne(Categories::class,['id'=>"cat_id"]);
    }

    public static function getDetailProduct($slug){
        $data = ProductsCommon::find()->where(['pro_slug'=>$slug]);
        $data = $data->asArray()->one();
        return $data;
    }
}