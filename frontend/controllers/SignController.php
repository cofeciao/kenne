<?php


namespace frontend\controllers;


use frontend\components\MyController;
use frontend\models\Sign;
use modava\kenne\models\Account;
use yii\helpers\Html;
use Yii;
class SignController extends MyController
{

    public function actionIndex()
    {
        $model = new Sign();

        if ($model->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->post()['Sign'];
            $email = $request['email'];
            $password = $request['password'];

            if($model->getLogin($email,$password) == true)
            {
                Yii::$app->session->setFlash('loginOK');
            }
            else
            {
                Yii::$app->session->setFlash('loginFail');
            }
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        $model = new Sign();

        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-view', [
                    'title' => 'Thông báo',
                    'text' => 'Tạo mới thành công',
                    'type' => 'success'
                ]);
                return $this->refresh();
            }
            else
            {
                $errors = Html::tag('p', 'Tạo mới thất bại');
                foreach ($model->getErrors() as $error) {
                    $errors .= Html::tag('p', $error[0]);
                }
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-form', [
                    'title' => 'Thông báo',
                    'text' => $errors,
                    'type' => 'warning'
                ]);
            }
        }
        return $this->render('register', [
            'model' => $model,
        ]);
    }
}