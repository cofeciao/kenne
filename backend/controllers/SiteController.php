<?php

namespace backend\controllers;

use backend\components\MyController;
use Yii;

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
        return $this->render('index', [
        ]);
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
