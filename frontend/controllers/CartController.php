<?php

namespace frontend\controllers;

use common\components\Component;
use frontend\components\MyController;
use frontend\components\Cart;
use Yii;

class CartController extends MyController
{
    public function actionIndex()
    {

        $total = 0;
        $data = unserialize(serialize(Component::getCookies('cart')));
        if (empty($data)){
            $data = "";
        } else {
            foreach ($data as $item){
                $total += $item['price'];
            }
        }
        return $this->render('index', [
            'data' => $data,
            'total'=>$total
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

    public function actionDelete($id){
        Cart::delete($id);
        return $this->goBack((!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : null));
    }

    public function actionDeleteAll(){
        Cart::deleteAll();;
        return $this->redirect(['/cart']);
    }
}