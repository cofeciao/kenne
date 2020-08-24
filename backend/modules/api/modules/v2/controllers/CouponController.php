<?php


namespace backend\modules\api\modules\v2\controllers;


use backend\modules\api\modules\v2\components\RestfullController;

class CouponController extends RestfullController
{
    public $modelClass = 'backend\modules\api\modules\v1\models\UserApi';

    public function actionCheckCode() {
        $code = \Yii::$app->request->get('code');

        return $code;
    }
}