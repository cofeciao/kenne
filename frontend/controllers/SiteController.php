<?php

namespace frontend\controllers;
use frontend\components\MyController;
use frontend\models\LoginForm;
use frontend\models\Products;
use frontend\models\SignupForm;
use Yii;
use yii\helpers\Url;

class SiteController extends MyController
{
    public function actionIndex(){
        $model = new Products();
        $proNew = $model->getProductLimitNumber(6);
        $dataBestSeller = $model->getBestSellerProduct();
        return $this->render('index', [
            'dataBestSeller' => $dataBestSeller,
            'proNew' => $proNew
        ]);
    }

    public function actionLogin(){
        if(!Yii::$app->user->isGuest){
            $this->redirect(\yii\helpers\Url::home());
        }
        $model = new LoginForm();
        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate() && $model->login())
        {
//            Yii::$app->session->setFlash('login-successful',[
//                'title' => '<b>Thông báo</b>',
//                'text' => 'Đăng nhập thành công',
//                'type' => 'success'
//            ]);
                $this->redirect(['/site/index']);
        } else {
//            $this->redirect(Url::home().'/site/login');
            $model->password = "";
//            Yii::$app->session->setFlash('login-fail',[
//                    'title' => '<b>Thông báo</b>',
//                    'text' => 'Đăng nhập thất bại',
//                    'type' => 'success'
//                ]);
        }
        return $this->render('login',[
            'model' => $model
        ]);

    }

    public function actionLogout(){

        if (!Yii::$app->user->isGuest){
            Yii::$app->user->logout();
            $this->redirect(['/site/index']);
        }
        return $this->render('logout',[

        ]);
    }

    public function actionSignup(){
        $model = new SignupForm();
        return $this->render('signup',[
            'model' => $model
        ]);
    }
}