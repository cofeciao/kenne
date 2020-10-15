<?php

namespace modava\iway\controllers;

use modava\iway\components\MyIwayController;
use modava\iway\models\search\TreatmentScheduleSearch;
use modava\iway\models\TreatmentSchedule;

/**
 * TreatmentScheduleController implements the CRUD actions for TreatmentSchedule model.
 * @property TreatmentSchedule $model
 * @property TreatmentScheduleSearch $searchModel
 */
class TreatmentScheduleController extends MyIwayController
{
    public $model = 'modava\iway\models\TreatmentSchedule';
    public $searchModel = 'modava\iway\models\search\TreatmentScheduleSearch';

}
