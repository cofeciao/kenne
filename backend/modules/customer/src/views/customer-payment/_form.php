<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Select2;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\customer\CustomerModule;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use modava\customer\models\table\CustomerTable;
use modava\customer\models\table\CustomerOrderTable;
use modava\customer\models\table\CustomerPaymentTable;

/* @var $this yii\web\View */
/* @var $model modava\customer\models\CustomerPayment */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
    <div class="customer-payment-form">
        <?php $form = ActiveForm::begin(); ?>
        <?php if ($model->order_id == null && Yii::$app->controller->action->id == 'create') { ?>
            <div class="row">
                <div class="col-md-6 col-12">
                    <?= Select2::widget([
                        'model' => $model,
                        'attribute' => 'customer_id',
                        'data' => ArrayHelper::map(CustomerTable::getCustomerDongY(), 'id', 'name'),
                        'options' => [
                            'class' => 'form-control load-data-on-change',
                            'load-data-element' => '#select-order',
                            'load-data-url' => Url::toRoute(['/customer/customer-order/get-order-by-customer']),
                            'load-data-key' => 'customer_id',
                            'load-data-call-back' => '',
                            'load-data-method' => 'GET'
                        ]
                    ]) ?>
                </div>
                <div class="col-md-6 col-12">
                    <?= Select2::widget([
                        'model' => $model,
                        'attribute' => 'order_id',
                        'data' => ArrayHelper::map(CustomerOrderTable::getOrderUnFinishByCustomer($model->customer_id), 'id', 'code'),
                        'options' => [
                            'id' => 'select-order'
                        ]
                    ]) ?>
                </div>
            </div>
        <?php } ?>

        <div id="order-info"></div>
        <div id="payment-info">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12"></div>
                <div class="col-md-3 col-sm-6 col-12 text-right">
                    Tổng cộng:
                </div>
                <div class="col-md-3 col-sm-6 col-12 text-right">
                    <strong id="payment-tong-cong"></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12"></div>
                <div class="col-md-3 col-sm-6 col-12 text-right">
                    Đặt cọc:
                </div>
                <div class="col-md-3 col-sm-6 col-12 text-right">
                    <strong id="payment-dat-coc"></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12"></div>
                <div class="col-md-3 col-sm-6 col-12 text-right">
                    Chiết khấu:
                </div>
                <div class="col-md-3 col-sm-6 col-12 text-right">
                    <strong id="payment-chiet-khau"></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12"></div>
                <div class="col-md-3 col-sm-6 col-12 text-right">
                    Đã thanh toán:
                </div>
                <div class="col-md-3 col-sm-6 col-12 text-right">
                    <strong id="payment-thanh-toan"></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12"></div>
                <div class="col-md-3 col-sm-6 col-12 text-right">
                    Còn lại:
                </div>
                <div class="col-md-3 col-sm-6 col-12 text-right">
                    <strong id="payment-conlai"></strong>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-12">
                <?= $form->field($model, 'price')->textInput() ?>
            </div>
            <div class="col-md-4 col-12">
                <?= Select2::widget([
                    'model' => $model,
                    'attribute' => 'payments',
                    'data' => CustomerPaymentTable::PAYMENTS,
                    'options' => []
                ]) ?>
            </div>
            <div class="col-md-4 col-12">
                <?= Select2::widget([
                    'model' => $model,
                    'attribute' => 'type',
                    'data' => CustomerPaymentTable::TYPE,
                    'options' => []
                ]) ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton(CustomerModule::t('customer', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
<?php
$url_get_payment_info = Url::toRoute(['get-payment-info']);
$order_id = $model->order_id;
$script = <<< JS
function getPaymentInfo(order_id){
    $.get('$url_get_payment_info', {order_id: order_id}, res => {
        $('#payment-info').html(res);
    });
}
// if('$order_id' !== '') getPaymentInfo($order_id);
JS;
$this->registerJs($script, \yii\web\View::POS_END);