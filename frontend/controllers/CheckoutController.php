<?php

namespace frontend\controllers;

use common\components\Component;
use frontend\components\Cart;
use frontend\components\MyController;
use frontend\models\LocationDistrict;
use frontend\models\LocationProvince;
use frontend\models\Orders;
use frontend\models\Products;
use frontend\models\Transaction;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use Yii;

class CheckoutController extends MyController
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect('/site/login');
        } else {
        $province = new LocationProvince();
        $provinceNames = $province->getAllProvince();

        $total = 0;
        $data = unserialize(serialize(Component::getCookies('cart')));
        if (empty($data)) {
            $data = "";
        } else {
            foreach ($data as $item) {
                $total += $item['price'];
            }
        }
        return $this->render('index', [
            'data' => $data,
            'total' => $total,
            'provinceNames' => $provinceNames
        ]);
        }
    }

    public function actionGetDistrict($id)
    {
        $model = new LocationDistrict();
        $query = $model->getAllDistrictById($id);
        return Json::encode($query);
    }

    public function actionAddOrder()
    {
        $province = new LocationProvince();
        $district = new LocationDistrict();
        $numberProductSell = 0;

        $data = Yii::$app->request->post();
        $idProvince = $data['city'];
        $idDistrict = $data['district'];
        $nameProvince = $province->getOneProvinceById($idProvince);
        $nameDistrict = $district->getOneDistricttById($idDistrict);
        // Nối string địa chỉ lại
        $address = $data['address'] . ', quận ' . $nameDistrict['name'] . ', tỉnh ' . $nameProvince['name'];

        $dataCart = unserialize(serialize(Component::getCookies('cart')));
        foreach ($dataCart as $item) {
            if ($item['sl'] > $item['pro_quantity']) {
                Yii::$app->session->setFlash('error', "Không lưu được đơn hàng.");
                return $this->redirect('/cart');
            }
        }

        //Lưu thông tin khách hàng
        $model = new Transaction();
        $model->tr_id_customer = Yii::$app->user->getId();
        $model->tr_name = $data['name'];
        $model->tr_address = $address;
        $model->tr_phone = $data['phone'];
        $model->tr_total = $data['total'];
        $model->tr_status = $model::DISABLE_STATUS;
        $model->created_at = time();
        $model->updated_at = time();
        $model->save();
        if ($model->save()) {
            $data['idDH'] = Yii::$app->db->getLastInsertID();
        }

        //Lưu chi tiết đơn hàng Orders
        foreach ($dataCart as $key => $item) {
            $modelOrder = new Orders();
            $modelProduct = new Products();
            $dataProduct = $modelProduct->getDetailProductById($key);
            $quantityProduct = $item['pro_quantity'] - $item['sl'];
            $numberProductSell = $dataProduct['pro_number'] + 1;
            $dataProduct->updateAttributes(['pro_quantity' => $quantityProduct]);
            $dataProduct->updateAttributes(['pro_number' => $numberProductSell]);
            $modelOrder->id_tr = $data['idDH'];
            $modelOrder->id_pro = $key;
            $modelOrder->or_quantity = $item['sl'];
            $modelOrder->or_price = $item['price'];
            $modelOrder->save();
        }

        if ($model->save() && $modelOrder->save()) {
            Cart::deleteAll();

            Yii::$app->session->setFlash('success', "<b>Bạn đã đặt hàng thành công.
         Vui lòng kiểm tra trong lịch sử đơn hàng của bạn</b>");
        } else {
            Yii::$app->session->setFlash('error', "Không lưu được đơn hàng.");
        }

        return $this->redirect('/account');
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
}