<?php


namespace frontend\controllers;


use common\components\Component;
use frontend\components\Cart;
use frontend\components\MyController;
use frontend\models\Products;
use Yii;

class CartController extends MyController
{
    public function actionIndex(){
        $total = 0;
        //$pro_quantity = [];
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
        Component::setCookies('cart',$data);

        return $this->render('index', [
            'data' => $data,
            'total'=>$total,
        ]);


    }

    public function actionAddCart(){
//        $queryParams = Yii::$app->request->queryParams;
//        $slug = $queryParams['slug'];
//        $product = Products::getDetailProduct($slug);
//        isset($queryParams['qtt']) ? $quantity = $queryParams['qtt']: $quantity = 1;
//        if ($quantity > $product['pro_quantity']){
//            \Yii::$app->session->setFlash('toastr-login-index', [
//                'title' => '<b>Thông báo</b>',
//                'text' => 'Đăng nhập thành công',
//                'type' => 'success'
//            ]);
//            Yii::$app->session->setFlash('error','<b>Số lượng không đủ</b>');
//            return $this->redirect(Yii::$app->request->referrer);
//        }
//        $cart = new Cart();
//        $cart->add($slug,$quantity);
//        //__PHP_Incomplete_Class Object with cookie.
//        //Need unserialize , serialize to transfer
//        return $this->goBack();
        $queryParams = Yii::$app->request->queryParams;
        $slug = $queryParams['slug'];
        $product = Products::getDetailProduct($slug);

        $cart = new Cart();
        $cart->add($slug);
        return $this->goBack();
    }

    public function actionDeleteAll(){
        Cart::deleteAll();
        return $this->redirect(['/cart']);
    }

    public function actionDelete(){
        $queryParams = Yii::$app->request->queryParams;
        Cart::delete($queryParams['id']);
        return $this->redirect(['/site']);
    }
}