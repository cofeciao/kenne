<?php

namespace modava\iway\controllers;

use modava\iway\models\DropdownsConfig;

class IwayController extends \modava\iway\components\MyIwayController
{
    public function actionIndex()
    {
        $model = new DropdownsConfig();

        return $this->render('index', ['model' => $model]);
    }
}