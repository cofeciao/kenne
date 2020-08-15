<?php


namespace frontend\models;


use modava\kenne\models\table\TransactionsTable;
use yii\data\ActiveDataProvider;

class Transaction extends TransactionsTable
{
    const ACTIVE_STATUS = 1;
    const DISABLE_STATUS = 0;

    public function getAllOrder($id){
        $query = self::find()
            ->where(['tr_id_customer'=>$id])
            ->orderBy(['id'=>SORT_DESC]);
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

    public function getOrderByTransaction(){
        return $this->hasMany(Orders::class,['id_tr'=>'id']);
    }
}