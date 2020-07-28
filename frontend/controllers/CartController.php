<?php


namespace frontend\controllers;


use common\components\Component;
use frontend\components\MyController;
use frontend\components\Cart;

class CartController extends MyController
{
    public function actionIndex()
    {
        return $this->render('index',[]);
    }

    public function actionAddCart($slug){
        $cart = new Cart();
        $cart->add( $slug);

        
        //__PHP_Incomplete_Class Object with cookie.
        //Need unserialize , serialize to transfer
        /*$ojb = unserialize (serialize (Component::getCookies('cart')));

        echo "<pre>";
        print_r($ojb);
        echo "</pre>";
        die;*/

    }
}