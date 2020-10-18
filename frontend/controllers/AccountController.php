<?php

namespace frontend\controllers;

use frontend\components\MyController;
use frontend\models\Orders;
use frontend\models\Products;
use frontend\models\Transaction;
use Yii;
use yii\data\ArrayDataProvider;
use yii\helpers\Json;
use yii\helpers\Url;

class AccountController extends MyController
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(Url::home());
        } else {
            $modelOrders = new Transaction();
            $query = $modelOrders->getAllOrder(Yii::$app->user->identity->getId());
            $data = $modelOrders->getPagination($query, 5);
            return $this->render('index', [
                'data' => $data
            ]);
        }
    }

    public function actionDetailOrder($id = null){
        $model = new Transaction();
        $modelProduct = new Products();
        $query = $model::findOne($id);
        $data = $query->orderByTransaction;

        foreach ($data as $key => $item){
            $data1 = $modelProduct::findOne($item['id_pro']);
            //$item['id_pro'] = $data1['pro_name'];
            $data[$key] = array_merge($item->attributes,['pro_name'=>$data1['pro_name']],['pro_image'=>$data1['pro_image']]);
        }
        $provider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 1,
            ],
        ]);
        return  $this->renderAjax('detail',[
           'dataDetail'=>$provider,
            'id'=>$id
        ]);
        //return Json::encode($data);
    }
}