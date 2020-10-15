<?php

namespace modava\iway\controllers;

use modava\iway\components\MyIwayController;
use modava\iway\models\Customer;
use modava\iway\models\search\CustomerSearch;
use Yii;
use yii\web\Response;

/**
 * CustomerController implements the CRUD actions for Customer model.
 * @property Customer $model
 * @property CustomerSearch $searchModel
 */
class CustomerController extends MyIwayController
{
    public $model = 'modava\iway\models\Customer';
    public $searchModel = 'modava\iway\models\search\CustomerSearch';

    public function actionGetCustomerByKeyWord($q = null, $id = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $out = Customer::getCustomerByKeyWord($q);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Customer::findOne($id)->fullname];
        }
        return $out;
    }
}
