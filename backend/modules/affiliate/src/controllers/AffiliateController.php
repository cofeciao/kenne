<?php

namespace modava\affiliate\controllers;

use modava\affiliate\components\MyAffiliateController;

class AffiliateController extends MyAffiliateController
{
    public function actionIndex()
    {
        return $this->render('index', []);
    }
}