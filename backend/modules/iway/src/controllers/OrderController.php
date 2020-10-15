<?php

namespace modava\iway\controllers;

use modava\auth\models\User;
use modava\iway\components\MyIwayController;
use Yii;
use yii\helpers\Html;
use yii\web\NotAcceptableHttpException;
use yii\web\NotFoundHttpException;
use modava\iway\models\Order;
use modava\iway\models\search\OrderSearch;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * OrderController implements the CRUD actions for Order model.
 * @property Order $model
 * @property OrderSearch $searchModel
 */
class OrderController extends MyIwayController
{
    public $model = 'modava\iway\models\Order';
    public $searchModel = 'modava\iway\models\search\OrderSearch';

    /**
    * Creates a new Order model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post())) {

            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if ($model->validate() && $model->save() && $model->saveSalesOrderDetail()) {
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-view', [
                    'title' => 'Thông báo',
                    'text' => 'Tạo mới thành công',
                    'type' => 'success'
                ]);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $errors = Html::tag('p', 'Tạo mới thất bại');
                foreach ($model->getErrors() as $error) {
                    $errors .= Html::tag('p', $error[0]);
                }
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-form', [
                    'title' => 'Thông báo',
                    'text' => $errors,
                    'type' => 'warning'
                ]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
    * Updates an existing Order model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if ($model->validate() && $model->save() && $model->saveSalesOrderDetail()) {
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-view', [
                    'title' => 'Thông báo',
                    'text' => 'Cập nhật thành công',
                    'type' => 'success',
                ]);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $errors = Html::tag('p', 'Cập nhật thất bại');
                foreach ($model->getErrors() as $error) {
                    $error1 = is_array($error[0]) ? implode($error[0], ', ') : $error[0];
                    $errors .= Html::tag('p', $error1);
                }
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-form', [
                    'title' => 'Thông báo',
                    'text' => $errors,
                    'type' => 'warning',
                ]);
            }
        }

        $model->order_detail = $model->salesOrderDetails;

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
    * Deletes an existing Order model.
    * If deletion is successful, the browser will be redirected to the 'index' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
    public function actionDelete($id)
    {
        if (!(Yii::$app->user->can(User::DEV) || Yii::$app->user->can('admin') || Yii::$app->user->can('iwayOrderDelete'))) {
            $message = Yii::t('backend', 'Bạn không có quyền xóa');
            if (Yii::$app->request->isAjax) {
                Yii::$app->session->setFlash('toastr-order-index', [
                    'title' => 'Thông báo',
                    'text' => $message,
                    'type' => 'warning'
                ]);
                return $this->redirect(['index']);
            }

            throw new NotAcceptableHttpException($message);
        }

        return parent::actionDelete($id);
    }
}
