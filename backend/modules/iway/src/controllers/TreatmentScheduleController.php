<?php

namespace modava\iway\controllers;

use modava\iway\components\MyIwayController;
use modava\iway\models\search\TreatmentScheduleSearch;
use modava\iway\models\TreatmentSchedule;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Response;

/**
 * TreatmentScheduleController implements the CRUD actions for TreatmentSchedule model.
 * @property TreatmentSchedule $model
 * @property TreatmentScheduleSearch $searchModel
 */
class TreatmentScheduleController extends MyIwayController
{
    public $model = 'modava\iway\models\TreatmentSchedule';
    public $searchModel = 'modava\iway\models\search\TreatmentScheduleSearch';

    public function actionGetRecordsByOrder()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $orderId = Yii::$app->request->get('order_id');
            $option_tag = Yii::$app->request->get('option_tag', false);
            $data = $this->model::find()->where(['order_id' => $orderId])->all();

            if (!count($data)) {
                $emptyModel = new $this->model();
                $emptyModel->title = Yii::t('backend', 'Không có liệu trình');
                $data = [
                    $emptyModel
                ];
            }

            if ($option_tag === false) {
                return [
                    'code' => 200,
                    'data' => ArrayHelper::map($data, 'id', 'title')
                ];
            } else {
                $options = '';
                foreach (ArrayHelper::map($data, 'id', 'title') as $i => $row) {
                    $options .= Html::tag('option', $row, [
                        'value' => $i
                    ]);
                }
                return [
                    'code' => 200,
                    'data' => $options
                ];
            }
        }
    }
}
