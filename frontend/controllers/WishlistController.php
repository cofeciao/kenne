<?php

namespace frontend\controllers;

use common\components\Component;
use frontend\components\Cart;
use frontend\components\MyController;
use Yii;

class WishlistController extends MyController
{
    public function actionIndex(){
        $cookieWishlist = Component::getCookies('cartWishlist');
        return $this->render('index',[
            'cookieWishlist'=>$cookieWishlist
        ]);
    }

    public function actionAddToWishlist(){
        $queryParams = Yii::$app->request->queryParams;
        $slug = $queryParams['slug'];
        isset($queryParams['qtt']) ? $quantity = $queryParams['qtt']: $quantity = 1;
        $cart = new Cart();
        $cart->addWishlist($slug);
        if($cart->addWishlist($slug) == 'fail'){
            return "fail";
        }
        else{
            return 'success';
        }
//        return $this->goBack();
    }
}