<?php

namespace modava\iway\controllers;

use modava\iway\components\MyIwayController;
use modava\iway\models\Call;
use modava\iway\models\search\CallSearch;

/**
 * CallController implements the CRUD actions for Call model.
 * @property Call $model
 * @property CallSearch $searchModel
 */
class CallController extends MyIwayController
{
    public $model = 'modava\iway\models\Call';
    public $searchModel = 'modava\iway\models\search\CallSearch';

}
