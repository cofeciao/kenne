<?php


namespace frontend\models;



use modava\location\models\table\LocationDistrictTable;

class LocationDistrict extends LocationDistrictTable
{
    public function getOneDistricttById($id)
    {
        $query = self::findOne($id);
        return $query;
    }

    public function getAllDistrictById($idProvince){
        $query = LocationDistrict::find();
        $query->where(['ProvinceId'=>$idProvince]);
        return $query->all();
    }
}