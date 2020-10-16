<?php

namespace backend\modules\calendar\controllers;


use backend\components\MyController;

class CalendarController extends MyController
{

    public function actionIndex()
    {
        return $this->render('index', [

        ]);
    }
}
