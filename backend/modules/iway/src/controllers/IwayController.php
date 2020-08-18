<?php

namespace modava\iway\controllers;

use modava\iway\models\Customer;

class IwayController extends \modava\iway\components\MyIwayController
{
    public function actionIndex()
    {
        $model = new Customer();

        return $this->render('index', ['model' => $model]);
    }
}