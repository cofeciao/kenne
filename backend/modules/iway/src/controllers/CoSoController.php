<?php

namespace modava\iway\controllers;

use backend\components\MyComponent;
use modava\iway\components\MyIwayController;
use yii\db\Exception;
use Yii;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use modava\iway\models\CoSo;
use modava\iway\models\search\CoSoSearch;

/**
 * CoSoController implements the CRUD actions for CoSo model.
 * @property CoSo $model
 * @property CoSoSearch $searchModel
 */
class CoSoController extends MyIwayController
{
    public $model = 'modava\iway\models\CoSo';
    public $searchModel = 'modava\iway\models\search\CoSoSearch';

}
