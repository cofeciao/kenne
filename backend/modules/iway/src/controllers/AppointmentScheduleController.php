<?php

namespace modava\iway\controllers;

use modava\iway\components\MyIwayController;
use modava\iway\models\AppointmentSchedule;
use modava\iway\models\search\AppointmentScheduleSearch;

/**
 * AppointmentScheduleController implements the CRUD actions for AppointmentSchedule model.
 * @property AppointmentSchedule $model
 * @property AppointmentScheduleSearch $searchModel
 */
class AppointmentScheduleController extends MyIwayController
{
    public $model = 'modava\iway\models\AppointmentSchedule';
    public $searchModel = 'modava\iway\models\search\AppointmentScheduleSearch';

}
