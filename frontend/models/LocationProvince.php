<?php


namespace frontend\models;

use modava\location\models\table\LocationProvinceTable;

class LocationProvince extends LocationProvinceTable
{
    public function getAllProvince(){
        $model = self::find()->all();
        return $model;

    }

    public function getOneProvinceById($id)
    {
        $query = self::findOne($id);
        return $query;
    }

}