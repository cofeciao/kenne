<?php


namespace frontend\controllers;


use common\components\Component;
use frontend\components\MyController;
use frontend\models\LocationDistrict;
use frontend\models\LocationProvince;
use Yii;
use yii\helpers\Json;

class CheckoutController extends MyController
{
    public function actionIndex(){
        if (Yii::$app->user->isGuest){
            $this->redirect(['site/login']);
        }
        $province = new LocationProvince();
        $provinceNames = $province->getAllProvince();
        $district = new LocationDistrict();
        $total = 0;
        $cookie = Component::getCookies('cart');

        if (empty($cookie))
        {
            $cookie = "";
        } else
        {
            foreach ($cookie as $item){
                $total+= $cookie[1]['price'];
            }
        }
        return $this->render('index' , [
            'province' => $province,
            'provinceNames' => $provinceNames,
            'total' => $total
        ]);
    }

    public function actionGetDistrict($id)
    {
        $model = new LocationDistrict();
        $query = $model->getAllDistrictById($id);
        return Json::encode($query);
    }
}