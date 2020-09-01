<?php

namespace modava\customer\controllers;

use backend\components\MyComponent;
use backend\components\MyController;
use modava\customer\CustomerModule;
use modava\customer\models\CustomerPayment;
use modava\customer\models\search\CustomerPaymentSearch;
use modava\customer\models\table\CustomerOrderTable;
use modava\customer\models\table\CustomerPaymentTable;
use Yii;
use yii\db\Exception;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * CustomerPaymentController implements the CRUD actions for CustomerPayment model.
 */
class CustomerPaymentController extends MyController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CustomerPayment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $order_id = Yii::$app->request->get('order_id');
        $searchModel = new CustomerPaymentSearch([
            'order_id' => $order_id
        ]);
        if ($order_id != null && ($searchModel->orderHasOne == null || $searchModel->orderHasOne->customerHasOne == null)) {
            Yii::$app->session->setFlash('toastr-' . $searchModel->toastr_key . '-index', [
                'title' => 'Thông báo',
                'text' => Yii::t('backend', 'Không tìm thấy thanh toán theo đơn hàng "' . $order_id . '"'),
                'type' => 'warning'
            ]);
            return $this->redirect(['index']);
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $totalPage = $this->getTotalPage($dataProvider);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'totalPage'    => $totalPage,
        ]);
    }


    /**
     * Displays a single CustomerPayment model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CustomerPayment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $order_id = Yii::$app->request->get('order_id');
        $model = new CustomerPayment([
            'order_id' => $order_id
        ]);
        if ($order_id != null && ($model->orderHasOne == null || $model->orderHasOne->customerHasOne == null)) {
            Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-form', [
                'title' => 'Thông báo',
                'text' => Yii::t('backend', 'Không tìm thấy đơn hàng "' . $order_id . '"'),
                'type' => 'warning'
            ]);
            return $this->redirect(['create']);
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
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
     * Updates an existing CustomerPayment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->save()) {
                    Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-view', [
                        'title' => 'Thông báo',
                        'text' => 'Cập nhật thành công',
                        'type' => 'success'
                    ]);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                $errors = Html::tag('p', 'Cập nhật thất bại');
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

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CustomerPayment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        try {
            if ($model->delete()) {
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-index', [
                    'title' => 'Thông báo',
                    'text' => 'Xoá thành công',
                    'type' => 'success'
                ]);
            } else {
                $errors = Html::tag('p', 'Xoá thất bại');
                foreach ($model->getErrors() as $error) {
                    $errors .= Html::tag('p', $error[0]);
                }
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-index', [
                    'title' => 'Thông báo',
                    'text' => $errors,
                    'type' => 'warning'
                ]);
            }
        } catch (Exception $ex) {
            Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-index', [
                'title' => 'Thông báo',
                'text' => Html::tag('p', 'Xoá thất bại: ' . $ex->getMessage()),
                'type' => 'warning'
            ]);
        }
        return $this->redirect(['index']);
    }

    /**
     * @param $perpage
     */
    public function actionPerpage($perpage)
    {
        MyComponent::setCookies('pageSize', $perpage);
    }

    /**
     * @param $dataProvider
     * @return float|int
     */
    public function getTotalPage($dataProvider)
    {
        if (MyComponent::hasCookies('pageSize')) {
            $dataProvider->pagination->pageSize = MyComponent::getCookies('pageSize');
        } else {
            $dataProvider->pagination->pageSize = 10;
        }

        $pageSize   = $dataProvider->pagination->pageSize;
        $totalCount = $dataProvider->totalCount;
        $totalPage  = (($totalCount + $pageSize - 1) / $pageSize);

        return $totalPage;
    }

    /**
     * @param null $payment_id
     * @return array
     */
    public function actionGetPaymentInfo($payment_id = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $payment_info = Yii::t('backend', 'Không tìm thấy đơn hàng');
        $order_id = Yii::$app->request->get('order_id');
        if (Yii::$app->request->isAjax && $order_id != null) {
            $order = CustomerOrderTable::getById($order_id);
            if ($order != null) {
                $total = $order->total;
                $discount = $order->discount;
                $deposit = $data_deposit = 0;
                $payment = $data_payment = 0;
                if (is_array($order->paymentHasMany)) {
                    foreach ($order->paymentHasMany as $order_payment) {
                        if ($order_payment->payments == CustomerPaymentTable::PAYMENTS_DAT_COC) {
                            $deposit += $order_payment->price;
                            if ($order_payment->id != $payment_id) {
                                $data_deposit += $order_payment->price;
                            }
                        }
                        if ($order_payment->payments == CustomerPaymentTable::PAYMENTS_THANH_TOAN) {
                            $payment += $order_payment->price;
                            if ($order_payment->id != $payment_id) {
                                $data_payment += $order_payment->price;
                            }
                        }
                    }
                }
                return [
                    'code' => 200,
                    'total' => $total,
                    'discount' => $discount,
                    'deposit' => $deposit,
                    'data_deposit' => $data_deposit,
                    'payment' => $payment,
                    'data_payment' => $data_payment,
                    'order_info' => $this->renderAjax('_get_order_info', [
                        'order' => $order,
                    ])
                ];
            }
        }
        return [
            'code' => 403,
            'payment_info' => $payment_info
        ];
    }

    /**
     * Finds the CustomerPayment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CustomerPayment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */


    protected function findModel($id)
    {
        if (($model = CustomerPayment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
    }
}
