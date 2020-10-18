<?php


namespace frontend\widgets;


use common\components\Component;
use frontend\models\Categories;
use yii\base\Widget;

class Header2Widget extends Widget
{
    public function run()
    {
        $totalPrice = 0;
        $total = 0 ;
        $data = Categories::find()->all();
        $cookies  = unserialize(serialize(Component::getCookies('cart')));



        if (empty($cookies)){
            $total = 0;
        }else{
            $total = count($cookies);
            foreach ($cookies as $item){
                $totalPrice += $item['price'];
            }
        }
        return $this->render('header2Widget',[
            'data'=>$data,
            'total'=>$total,
            'totalPrice'=> $totalPrice
        ]);
    }
}