<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 26-Apr-19
 * Time: 3:59 PM
 */

namespace backend\modules\helper\controllers;

use backend\components\MyController;
use backend\modules\helper\models\HelperModel;
use yii\web\Response;

class HelperController extends MyController
{
    public function actionIndex()
    {
        $model = new HelperModel();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionStrtotime()
    {
        if (\Yii::$app->request->isAjax) {
            $date = \Yii::$app->request->post('str');
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ['date' => strtotime($date)];
        }
    }

    public function actionDatetoint()
    {
        if (\Yii::$app->request->isAjax) {
            $date = \Yii::$app->request->post('int');
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ['int' => date('d-m-Y H:i:s', $date)];
        }
    }
}
