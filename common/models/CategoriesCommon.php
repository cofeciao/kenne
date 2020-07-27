<?php


namespace common\models;


use yii\db\ActiveRecord;

class CategoriesCommon extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }

    public function getProducts(){
        return $this->hasMany(ProductsCommon::class,['cat_id'=> 'id']);
    }
}