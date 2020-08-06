<?php

namespace modava\calendar\controllers;



use modava\calendar\components\MyCalendarController;

class CalendarController extends MyCalendarController
{

    public function actionIndex()
    {
        return $this->render('index', [

        ]);
    }
}
