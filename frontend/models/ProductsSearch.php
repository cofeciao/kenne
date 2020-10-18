<?php


namespace frontend\models;


use function GuzzleHttp\Promise\all;

class ProductsSearch extends Products
{
    public function search($param){
        $query = Products::find()
                ->andFilterWhere([
                    'or',
                    ['like','pro_slug',$param],
                ]);
        return $query;
    }
}