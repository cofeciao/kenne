<?php


namespace modava\iway\controllers;


use modava\iway\components\MyIwayController;
use yii\helpers\Url;

class IwayController extends MyIwayController
{

    public function actionIndex()
    {
        return $this->redirect(Url::toRoute(['/iway/customer']));
    }

    public function actionDoctorView()
    {
        return $this->render('doctor-view');
    }
}