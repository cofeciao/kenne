<?php


namespace frontend\models;


use yii\data\Pagination;
use yii\db\ActiveRecord;

class Categories extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }

    public function getProducts(){
        return $this->hasMany(Products::class,['cat_id'=> 'id']);
    }

}