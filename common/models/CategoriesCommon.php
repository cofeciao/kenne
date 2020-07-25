<?php


namespace common\models;


use yii\db\ActiveRecord;

class CategoriesCommon extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }
}