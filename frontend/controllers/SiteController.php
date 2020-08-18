<?php

namespace frontend\controllers;

use frontend\models\LoginForm;
use frontend\models\Products;
use frontend\components\MyController;
use frontend\models\SignupForm;
use modava\kenne\models\Account;
use yii\helpers\Url;
use yii\web\Response;
use yii\widgets\ActiveForm;

class SiteController extends MyController
{
    public function actionIndex()
    {
        $model = new Products();
        $proNew = $model->getProductLimitNumber(6);
        $proBags = $model->getProductsByCategories(7);
        $proShirts = $model->getProductsByCategories(6);
        $proShoes = $model->getProductsByCategories(8);
        $dataBestSeller = $model->getBestSellerProduct();
        return $this->render('index', [
            'data' => $proNew,
            'proBags' => $proBags,
            'proShirts' => $proShirts,
            'proShoes' => $proShoes,
            'dataBestSeller' => $dataBestSeller
        ]);
    }

    public function actionLogin()
    {
        /*if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }*/


        if (!\Yii::$app->user->isGuest) {
            return $this->goBack();
        }
        $model = new LoginForm();

        if ($model->load(\Yii::$app->request->post()) && $model->login()) {

            \Yii::$app->session->setFlash('toastr-login-index', [
                'title' => '<b>Thông báo</b>',
                'text' => 'Đăng nhập thành công',
                'type' => 'success'
            ]);
            //\Yii::$app->session->setFlash('success', 'Đăng nhập thành công');
            return $this->redirect(Url::home());
        } else {
            $model->password = '';
            return $this->render('login', [
                'model' => $model
            ]);
        }
    }

    public function actionSignup()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goBack(); 
        }
        $model = new SignupForm();
        if ($model->load(\Yii::$app->request->post()) && $model->signup()) {
            \Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->redirect('/site/login');
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        if(!\Yii::$app->user->isGuest){
            \Yii::$app->user->logout(true);
            \Yii::$app->session->setFlash('toastr-logout-index', [
                'title' => '<b>Thông báo</b>',
                'text' => 'Đăng xuất thành công',
                'type' => 'info'
            ]);
        }
        return $this->redirect(Url::home());
    }

    public function actionValidate(){
        if(\Yii::$app->request->isAjax){
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $model = new LoginForm();
            if($model->load(\Yii::$app->request->post())){
                return ActiveForm::validate($model);
            }
        }
    }
}