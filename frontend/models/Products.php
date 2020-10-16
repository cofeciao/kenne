<?php

namespace frontend\models;

use modava\kenne\models\table\ProductsTable;
use yii\data\ActiveDataProvider;

class Products extends ProductsTable
{
    const ACTIVE_STATUS = 1;
    public $qtt ;

    public function getCategory(){
        return $this->hasOne(Categories::class,['id'=>"cat_id"]);
    }

    public function getDetailProductById($id){
        $data = self::find()->where(['id'=>$id])->one();
        return $data;
    }

    public function getBestSellerProduct(){
        $data = self::find()
            ->orderBy(['pro_number'=>SORT_DESC])
            ->limit(6);
        return $data->all();
    }

    public static function getDetailProduct($slug){
        $data = self::find()->where(['pro_slug'=>$slug]);
        $data = $data->asArray()->one();
        return $data;
    }

    public function getProductsByCategories($id = null){
        $query = self::find()->where(['cat_id' => $id]);

        return $query->all();
    }

    public function getProductLimitNumber($limit = null) {
        $query = Products::find()->orderBy('id');

        if ($limit != null) {
            $query->limit($limit);
        }

        return $query->all();
    }

    public function getAllProducts(){
        $query = self::find()->where(['pro_status' => self::ACTIVE_STATUS]);
        return $query;
    }

    public function getProductByCategory($slug){
        $model = new Categories();
        $query = $model->find();
        $query = $query->where(['cat_slug' => $slug])->one();
        $data = $query->getProducts();
        return $data;
    }

    public function getPagination($query,$pageSize = 6){
        $data = new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'defaultPageSize'=>$pageSize,
                'totalCount'=> $query->count(),
            ]
        ]);
        return $data;
    }

    public function sortProduct($query='', $sort = 1){
        switch ($sort){
            case 1:
                return $query;
                break;
            case 2:
                return $query->orderBy(['pro_name'=> SORT_ASC]);
                break;
            case 3:
                return $query->orderBy(['pro_name'=> SORT_DESC]);
                break;
            case 4:
                return $query->orderBy(['pro_price'=> SORT_ASC]);
                break;
            case 5:
                return $query->orderBy(['pro_price'=> SORT_DESC]);
                break;
        }
    }

    public function search($param){
        $query = Products::find()
            ->andFilterWhere([
                'or',
                ['like','pro_slug',$param],
            ]);
        return $query;
    }

    public function getProductByOrder(){
        return $this->hasMany(Orders::class,['id_pro'=>'id']);
    }
}