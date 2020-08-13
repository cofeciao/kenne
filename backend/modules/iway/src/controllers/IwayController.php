<?php

namespace modava\iway\controllers;

use modava\iway\components\MyIwayController;

class IwayController extends MyIwayController
{
    public function actionIndex()
    {
        return $this->render('index', []);
    }
}