<?php

namespace modava\iway\controllers;

use modava\iway\components\MyIwayController;
use modava\iway\models\DropdownsConfig;
use modava\iway\models\search\DropdownsConfigSearch;
use Yii;
use yii\web\Response;

/**
 * DropdownsConfigController implements the CRUD actions for DropdownsConfig model.
 * @property DropdownsConfig $model
 * @property DropdownsConfigSearch $searchModel
 */
class DropdownsConfigController extends MyIwayController
{
    public $model = 'modava\iway\models\DropdownsConfig';
    public $searchModel = 'modava\iway\models\search\DropdownsConfigSearch';

    /**
     * @return array|string
     */
    public function actionGetColumns()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $tableName = Yii::$app->request->get('table_name');
            $data = DropdownsConfig::getAllColumns($tableName);

            return [
                'code' => 200,
                'data' => $data
            ];
        }

        return Yii::t('backend', 'Không thể truy cập');
    }
}
