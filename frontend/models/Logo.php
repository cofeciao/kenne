<?php


namespace frontend\models;


use modava\kenne\models\table\LogoTable;

class Logo extends LogoTable
{
    public function getAllLogo()
    {
        $data = self::find()->where(['status'=> self::ACTIVE_STATUS])->all();
        return $data;
    }
}