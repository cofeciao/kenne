<?php

namespace backend\controllers;

use backend\components\MyController;
use cheatsheet\Time;
use common\commands\SendEmailCommand;
use common\models\UserToken;
use modava\auth\models\User;
use modava\vht\SmsVht;
use Yii;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends MyController
{
    public function actionBaotri()
    {
        $this->layout = false;
        return $this->render('baotri', []);
    }

    public function actionIndex()
    {
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => 'hoaitam.it94@gmail.com',
        ]);
        $token = UserToken::create($user->id, UserToken::TYPE_PASSWORD_RESET, Time::SECONDS_IN_A_DAY);
        $a = \Yii::$app->commandBus->handle(new SendEmailCommand([
            'to' => 'hoaitam.it94@gmail.com',
            'subject' => \Yii::t('frontend', 'Yêu cầu lấy lại mật khẩu từ {name}', ['name' => \Yii::$app->name]),
            'view' => 'passwordResetToken',
            'params' => [
                'user' => $user,
                'token' => $token->token,
            ]
        ]));
        var_dump($a);
        die;
        /*$data = [
            '0762296277',
            '0979883765'
        ];
        $sms = new SmsVht([
            'username' => 'myauriscskh',
            'password' => 'amkycdaubcrs5uim8akzlvfatx',
            'prefixId' => 'MY AURIS',
            'commandCode' => 'MY AURIS',
            'debug' => true,
            'phones' => $data,
            'messages' => 'abc'
        ]);
        $sms->send();*/
        return $this->render('index', [
        ]);
    }

    public function actionGetDataLineChart()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            [
                'y' => '100', 'a' => 10, 'b' => 20, 'c' => 40],
            [
                'y' => '200', 'a' => 30, 'b' => 50, 'c' => 70],
            [
                'y' =>
                    '300', 'a' => 20, 'b' => 40, 'c' => 50],
            [
                'y' => '400', 'a' => 50, 'b' => 70, 'c' => 90],
            [
                'y' => '500', 'a' => 10, 'b' => 40, 'c' => 100],

        ];
    }

    public function actionGetDataLineCharts()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            [
                'period' => "2010",
                'iphone' => '50',
            ],
            [
                'period' => "2011",
                'iphone' => 130,
            ],
            [
                'period' => "2012",
                'iphone' => 80,
            ],
            [
                'period' => "2013",
                'iphone' => 70,
            ],
            [
                'period' => "2014",
                'iphone' => 180,
            ],
            [
                'period' => "2015",
                'iphone' => 105,
            ],
            [
                'period' => "2016",
                'iphone' => 250,
            ],
        ];
    }

    public function actionError()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['auth/login.html']);
        } else {
            $exception = Yii::$app->errorHandler->exception;
            if ($exception !== null) {
                return $this->render('error', ['exception' => $exception]);
            }
        }
    }
}
