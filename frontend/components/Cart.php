<?php

namespace frontend\components;

use frontend\models\Products;
use common\components\Component;

class Cart
{
    public function add($slug, $quantity = 1){
        $data = Products::findOne(['pro_slug'=>$slug]);
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
        /*//$this->cartstore = unserialize (serialize (Component::getCookies('cart')));*/
        /*if(!Component::hasCookies('cart')){
                  Component::setCookies('cart',$this->cartstore);
        }else{
            $this->cartstore = unserialize (serialize (Component::getCookies('cart')));
        }*/
//        $cookies = \Yii::$app->response->cookies;
//        $cookies->remove('cart');*/
    }
    //Xóa 1 sản phẩm trong giỏ h
    public static function delete($id){
        $data = unserialize(serialize(Component::getCookies('cart')));

        if (array_key_exists($id,$data)){
            unset($data[$id]);
        }
        Component::setCookies('cart',$data);
    }

    //Xóa toàn bộ sản phẩm trong giỏ hàng
    public static function deleteAll(){
        $data = unserialize(serialize(Component::getCookies('cart')));
        unset($data);
        $data = null;
        Component::setCookies('cart',$data);
    }

    public function addWishlist($slug){
        $data = Products::findOne(['pro_slug'=>$slug]);
        $id = $data['id'];
        $data1[$id] = $data;
        if(!Component::hasCookies('cartWishlist')){
            Component::setCookies('cartWishlist',$data1);
        }
        $cartstore = unserialize (serialize (Component::getCookies('cartWishlist')));
        if (empty($cartstore)){
            $cartstore[$id] = [
                'slug' => $data->pro_slug,
                'price' => $data->pro_price,
                'image' => $data->pro_image,
                'name' => $data->pro_name,
            ];
            $notification = "success";
        }else {
            if (array_key_exists($id, $cartstore)) {
                $notification = "fail";

            } else {
                $cartstore[$id] = [
                    'slug' => $data->pro_slug,
                    'price' => $data->pro_price,
                    'image' => $data->pro_image,
                    'name' => $data->pro_name,
                ];
                $notification = "success";

            }
        }
        Component::setCookies('cartWishlist',$cartstore);
        return $notification;
        /*//$this->cartstore = unserialize (serialize (Component::getCookies('cart')));*/
        /*if(!Component::hasCookies('cart')){
                  Component::setCookies('cart',$this->cartstore);
        }else{
            $this->cartstore = unserialize (serialize (Component::getCookies('cart')));
        }*/
//        $cookies = \Yii::$app->response->cookies;
//        $cookies->remove('cart');*/
    }

    public static function deleteWishlist($id){
        $data = unserialize(serialize(Component::getCookies('cartWishlist')));

        if (array_key_exists($id,$data)){
            unset($data[$id]);
        }
        Component::setCookies('cartWishlist',$data);
    }

    public static function deleteAllWishlist(){
        $data = unserialize(serialize(Component::getCookies('cartWishlist')));
        unset($data);
        $data = null;
        Component::setCookies('cartWishlist',$data);
    }
}