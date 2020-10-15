<?php

namespace modava\iway\controllers;

use backend\components\MyComponent;
use modava\iway\components\MyIwayController;
use yii\db\Exception;
use Yii;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use yii\web\NotAcceptableHttpException;
use yii\web\NotFoundHttpException;
use modava\iway\models\Receipt;
use modava\iway\models\search\ReceiptSearch;

/**
 * ReceiptController implements the CRUD actions for Receipt model.
 * @property Receipt $model
 * @property ReceiptSearch $searchModel
 */
class ReceiptController extends MyIwayController
{
    public $model = 'modava\iway\models\Receipt';
    public $searchModel = 'modava\iway\models\search\ReceiptSearch';

    /**
    * Deletes an existing Receipt model.
    * If deletion is successful, the browser will be redirected to the 'index' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
    public function actionDelete($id)
    {
        if ($model = $this->findModel($id)) {
            if ($model->order->status === 'huy') {
                $message = Yii::t('backend', 'Không thể xóa phiếu thu của đơn hàng đã hủy');
                if (Yii::$app->request->isAjax) {
                    Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-index', [
                        'title' => 'Thông báo',
                        'text' => $message,
                        'type' => 'warning'
                    ]);
                    return $this->redirect(['index']);
                }

                throw new NotAcceptableHttpException($message);
            }
        }
        return parent::actionDelete($id);
    }
}
