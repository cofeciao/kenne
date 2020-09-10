<?php

namespace backend\modules\api\modules\v2\controllers;

use modava\affiliate\models\Customer;
use modava\affiliate\models\Payment;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use modava\affiliate\models\Order;
use modava\affiliate\models\Receipt;
use Yii;
use backend\modules\api\modules\v2\components\RestfullController;
use modava\affiliate\models\Coupon;
use yii\web\Response;

class CouponController extends RestfullController
{
    public $modelClass = 'backend\modules\api\modules\v1\models\UserApi';

    public function actionCheckCode()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $code = \Yii::$app->request->get('code');

        $coupon = Coupon::checkCoupon($code);

        if ($coupon) {
            return [
                'success' => true,
                'message' => Yii::t('backend', 'Mã code do khách hàng {full_name} giới thiệu', ['full_name' => $coupon->customer->full_name]),
                'data' => $coupon->getAttributes()
            ];
        }

        return [
            'success' => false,
            'message' => Yii::t('backend', 'Mã code không tồn tại hoặc đã được sử dụng')
        ];
    }

    public function actionSaveOrderByPartnerCode()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $code = Yii::$app->request->post('partner_order_code');

        if ($code) {
            $model = Order::findOne(['partner_order_code' => $code]);
            if ($model === null) {
                $model = new Order();
            }
        } else {
            Yii::$app->response->statusCode = 400;
            return [
                'success' => false,
                'error' => [
                    'code' => 404,
                    'message' => [
                        'partner_order_code' => 'partner_order_code Không được để trống'
                    ]
                ]
            ];
        }

        if ($model->loadFromApi(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            Yii::$app->response->statusCode = 200;
            return [
                'success' => true,
                'code' => 200,
                'data' => $model->getAttributes(),
            ];
        } else {
            Yii::$app->response->statusCode = 400;

            if ($model->hasErrors('coupon_id')) {
                $model->clearErrors('coupon_id');

                if (Yii::$app->request->post('coupon_code')) {
                    $model->addError('coupon_code', 'Mã coupon không tồn tại hoặc đã được sử dụng');
                } else {
                    $model->addError('coupon_code', 'Mã coupon không được để trống');
                }
            }

            return [
                'success' => false,
                'error' => [
                    'code' => 400,
                    'message' => $model->getErrors()
                ]
            ];
        }
    }

    public function actionSaveOrder()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id');

        if ($id) {
            $model = Order::findOne($id);
            if ($model === null) {
                Yii::$app->response->statusCode = 404;
                return [
                    'success' => false,
                    'error' => [
                        'code' => 404,
                        'message' => "not found"
                    ]
                ];
            }
        } else {
            $model = new Order();
        }

        if ($model->loadFromApi(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            Yii::$app->response->statusCode = 200;
            return [
                'success' => true,
                'code' => 200,
                'data' => $model->getAttributes(),
            ];
        } else {
            Yii::$app->response->statusCode = 400;

            if ($model->hasErrors('coupon_id')) {
                $model->clearErrors('coupon_id');

                if (Yii::$app->request->post('coupon_code')) {
                    $model->addError('coupon_code', 'Mã coupon không tồn tại hoặc đã được sử dụng');
                } else {
                    $model->addError('coupon_code', 'Mã coupon không được để trống');
                }
            }

            return [
                'success' => false,
                'error' => [
                    'code' => 400,
                    'message' => $model->getErrors()
                ]
            ];
        }
    }

    public function actionSavePayment()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id');

        if ($id) {
            $model = Payment::findOne($id);
            if ($model === null) {
                Yii::$app->response->statusCode = 404;
                return [
                    'success' => false,
                    'error' => [
                        'code' => 404,
                        'message' => "not found"
                    ]
                ];
            }
        } else {
            $model = new Payment();
        }

        if ($model->loadFromApi(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            Yii::$app->response->statusCode = 200;
            return [
                'success' => true,
                'code' => 200,
                'data' => $model->getAttributes(),
            ];
        } else {
            Yii::$app->response->statusCode = 400;

            return [
                'success' => false,
                'error' => [
                    'code' => 400,
                    'message' => $model->getErrors()
                ]
            ];
        }
    }

    public function actionSaveReceipt()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id');

        if ($id) {
            $model = Receipt::findOne($id);
            if ($model === null) {
                Yii::$app->response->statusCode = 404;
                return [
                    'success' => false,
                    'error' => [
                        'code' => 404,
                        'message' => "not found"
                    ]
                ];
            }
        } else {
            $model = new Receipt();
        }

        if ($model->loadFromApi(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            Yii::$app->response->statusCode = 200;
            return [
                'success' => true,
                'code' => 200,
                'data' => $model->getAttributes(),
            ];
        } else {
            Yii::$app->response->statusCode = 400;

            return [
                'success' => false,
                'error' => [
                    'code' => 400,
                    'message' => $model->getErrors()
                ]
            ];
        }
    }

    public function actionSaveReceiptByPartnerCode()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $code = Yii::$app->request->post('partner_code');

        if ($code) {
            $model = Receipt::findOne(['partner_code' => $code]);
            if ($model === null) {
                $model = new Receipt();
            }
        } else {
            Yii::$app->response->statusCode = 404;
            return [
                'success' => false,
                'error' => [
                    'code' => 404,
                    'message' => "partner_code Không được để trống"
                ]
            ];
        }

        if ($model->loadFromApi(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            Yii::$app->response->statusCode = 200;
            return [
                'success' => true,
                'code' => 200,
                'data' => $model->getAttributes(),
            ];
        } else {
            Yii::$app->response->statusCode = 400;

            return [
                'success' => false,
                'error' => [
                    'code' => 400,
                    'message' => $model->getErrors()
                ]
            ];
        }
    }

    public function actionDeleteRecord()
    {
        $target = Yii::$app->request->post('target');
        $id = Yii::$app->request->post('id');

        switch ($target) {
            case 'Receipt':
                $model = Receipt::findOne($id);
                break;
            case 'Order':
                $model = Order::findOne($id);
                break;
            default:
                $model = null;
                break;
        }

        if ($model == null) {
            Yii::$app->response->statusCode = 400;
            return [
                'success' => false,
                'error' => [
                    'code' => 400,
                    'message' => [Yii::t('backend', '{target} không tồn tại', ['target' => $target])]
                ]
            ];
        }

        try {
            if ($model->delete()) {
                $code = 200;
                Yii::$app->response->statusCode = $code;
                $message = Yii::t('backend', 'Xóa thành công');
                $status = true;
            } else {
                $code = 406;
                Yii::$app->response->statusCode = $code;
                $message = $model->getErrors();
                $status = false;
            }
        } catch (Exception $ex) {
            $code = 406;
            Yii::$app->response->statusCode = $code;
            $message = [$ex->getMessage()];
            $status = false;
        }

        return [
            'success' => $status,
            'error' => [
                'code' => $code,
                'message' => $message
            ]
        ];
    }

    public function actionDeleteRecordByPartnerCode()
    {
        $target = Yii::$app->request->post('target');
        $partnerCode = Yii::$app->request->post('code');

        switch ($target) {
            case 'Receipt':
                $model = Receipt::findOne(['partner_code' => $partnerCode]);
                break;
            case 'Order':
                $model = Order::findOne(['partner_order_code' => $partnerCode]);
                break;
            default:
                $model = null;
                break;
        }

        if ($model == null) {
            Yii::$app->response->statusCode = 400;
            return [
                'success' => false,
                'error' => [
                    'code' => 400,
                    'message' => [Yii::t('backend', '{target} không tồn tại', ['target' => $target])]
                ]
            ];
        }

        try {
            if ($model->delete()) {
                $code = 200;
                Yii::$app->response->statusCode = $code;
                $message = Yii::t('backend', 'Xóa thành công');
                $status = true;
            } else {
                $code = 406;
                Yii::$app->response->statusCode = $code;
                $message = $model->getErrors();
                $status = false;
            }
        } catch (Exception $ex) {
            $code = 406;
            Yii::$app->response->statusCode = $code;
            $message = [$ex->getMessage()];
            $status = false;
        }

        return [
            'success' => $status,
            'error' => [
                'code' => $code,
                'message' => $message
            ]
        ];
    }

    public function actionPayments($customerId)
    {
        if (!$customerId) {
            Yii::$app->response->statusCode = 400;
            return [
                'success' => false,
                'error' => [
                    'code' => 400,
                    'message' => "customer-id is required"
                ]
            ];
        }

        if (!Customer::findOne($customerId)) {
            Yii::$app->response->statusCode = 404;
            return [
                'success' => false,
                'error' => [
                    'code' => 404,
                    'message' => "Không tìm thấy khách hàng"
                ]
            ];
        }

        return [
            'success' => true,
            'data' => Payment::findByCustomer($customerId)
        ];
    }

    public function actionCustomersForPay() {
        $dataProvider = new ActiveDataProvider([
            'query' => Customer::find()->where('total_commission_remain > 0'),
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        return [
            'success' => true,
            'data' => $dataProvider->getModels(),
            'total_count' => $dataProvider->getTotalCount()
        ];
    }
}