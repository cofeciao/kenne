<?php

namespace backend\modules\api\modules\v2\controllers;

use modava\affiliate\models\Order;
use Yii;
use backend\modules\api\modules\v2\components\RestfullController;
use modava\affiliate\AffiliateModule;
use modava\affiliate\models\Coupon;
use yii\web\Response;

class CouponController extends RestfullController
{
    public $modelClass = 'backend\modules\api\modules\v1\models\UserApi';

    public function actionCheckCode() {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $code = \Yii::$app->request->get('code');

        $coupon = Coupon::checkCoupon($code);

        if ($coupon) {
            return [
                'success' => true,
                'message' => AffiliateModule::t('affiliate', 'Mã code do khách hàng {full_name} giới thiệu', ['full_name' => $coupon->customer->full_name])
            ];
        }

        return [
            'success' => false,
            'message' => AffiliateModule::t('affiliate', 'Mã code không tồn tại hoặc đã được sử dụng')
        ];
    }

    public function actionSaveOrder() {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id');

        if ($id) {
            $model = Order::findOne($id);
            if ($model === null) {
                Yii::$app->response->statusCode = 404;
                return [
                    'success' => false,
                    'error' => [
                        'code' => 404,
                        'message' => "not found"
                    ]
                ];
            }
        } else {
            $model = new Order();
        }

        $model->loadFromApi(Yii::$app->request->post());

        if ($model->validate() && $model->save()) {
            Yii::$app->response->statusCode = 200;
            return [
                'success' => 'true',
                'code' => 200,
                'data' => $model->getAttributes(),
            ];
        } else {
            Yii::$app->response->statusCode = 400;
            return [
                'success' => 'false',
                'error' => [
                    'code' => 400,
                    'message' => $model->getErrors()
                ]
            ];
        }
    }
}