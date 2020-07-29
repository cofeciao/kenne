<?php

namespace frontend\components;

use common\models\ProductsCommon;
use common\components\Component;

class Cart
{
    public function add($slug, $quantity = 1){
        $data = ProductsCommon::findOne(['pro_slug'=>$slug]);
        $id = $data['id'];
        $data1[$id] = $data;
        if(!Component::hasCookies('cart')){
            Component::setCookies('cart',$data1);
        }
        $cartstore = unserialize (serialize (Component::getCookies('cart')));
        if (empty($cartstore)){
            $cartstore[$id] = [
                'slug' => $data->pro_slug,
                'sl' => $quantity,
                'price' => $data->pro_price,
                'image' => $data->pro_image,
                'name' => $data->pro_name,
            ];
        }else {
            if (array_key_exists($id, $cartstore)) {
                $cartstore[$id] = [
                    'slug' => $data->pro_slug,
                    'sl' => (int)$cartstore[$id]['sl'] + (int)$quantity,
                    'price' => $data->pro_price,
                    'image' => $data->pro_image,
                    'name' => $data->pro_name,
                ];
            } else {
                $cartstore[$id] = [
                    'slug' => $data->pro_slug,
                    'sl' => $quantity,
                    'price' => $data->pro_price,
                    'image' => $data->pro_image,
                    'name' => $data->pro_name,
                ];
            }
        }

        Component::setCookies('cart',$cartstore);



        //$this->cartstore = unserialize (serialize (Component::getCookies('cart')));*/

        /*if(!Component::hasCookies('cart')){
                  Component::setCookies('cart',$this->cartstore);
        }else{
            $this->cartstore = unserialize (serialize (Component::getCookies('cart')));
        }*/

//        $cookies = \Yii::$app->response->cookies;
//        $cookies->remove('cart');

    }
}