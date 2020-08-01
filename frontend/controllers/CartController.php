<?php

namespace frontend\controllers;

use common\components\Component;
use frontend\components\MyController;
use frontend\components\Cart;
use frontend\models\Products;
use Yii;

class CartController extends MyController
{
    public function actionIndex()
    {
        $total = 0;
        $pro_quantity = [];
        $data = unserialize(serialize(Component::getCookies('cart')));
        if (empty($data)){
            $data = "";
        } else {
            foreach ($data as $key => $item){
                $slug = $item['slug'];
                $product = Products::getDetailProduct($slug);
                //$pro_quantity[$key]['pro_quantity'] = $product['pro_quantity'];
                $data[$key]['pro_quantity']= $product['pro_quantity'];
                $total += $item['price']*$item['sl'];
            }
        }

        return $this->render('index', [
            'data' => $data,
            'total'=>$total,
        ]);
    }

    public function actionAddCart()
    {

       $queryParams = Yii::$app->request->queryParams;
        $slug = $queryParams['slug'];
        isset($queryParams['qtt']) ? $quantity = $queryParams['qtt']: $quantity = 1;
        $cart = new Cart();
        $cart->add($slug,$quantity);

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

    public function actionUpdateQuantity(){
        $kq = [];
        $data = unserialize(serialize(Component::getCookies('cart')));

        $data1 = Yii::$app->request->post();

        unset($data1['_csrf']);

        foreach ($data as $key => $value){
            foreach($data1 as $k => $v){
                if ( $k == $key ){
                    $value['sl'] = $v['sl'];;
                }
            }
            $kq[$key] = $value;
        }

        Component::setCookies('cart',$kq);

        return $this->goBack((!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : null));

    }
}