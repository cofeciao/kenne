<?php

namespace modava\iway\controllers;

class IwayController extends \modava\iway\components\MyIwayController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}