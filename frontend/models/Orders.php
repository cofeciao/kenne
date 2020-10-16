<?php


namespace frontend\models;


use modava\kenne\models\table\OrdersTable;
use yii\data\ActiveDataProvider;

class Orders extends OrdersTable
{
    public function getAllOrder($id){
        $query = self::find($id);
        return $query;
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

    public function getProductByOrder(){
        return $this->hasMany(Products::class,['id_pro'=>'id']);
    }
}