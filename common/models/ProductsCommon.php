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


}