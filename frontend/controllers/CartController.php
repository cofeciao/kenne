<?php

namespace frontend\controllers;

use common\components\Component;
use frontend\components\MyController;
use frontend\components\Cart;

class CartController extends MyController
{
    public function actionIndex()
    {
        $data = unserialize(serialize(Component::getCookies('cart')));

        return $this->render('index', [
            'data' => $data
        ]);
    }

    public function actionAddCart($slug)
    {
        $cart = new Cart();
        $cart->add($slug);

        //__PHP_Incomplete_Class Object with cookie.
        //Need unserialize , serialize to transfer

        return $this->redirect(['/cart']);

    }
}