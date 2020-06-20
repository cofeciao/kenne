<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Select2;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\customer\CustomerModule;
use yii\helpers\ArrayHelper;
use modava\customer\models\table\CustomerTable;
use modava\customer\models\table\CustomerOrderTable;

/* @var $this yii\web\View */
/* @var $model modava\customer\models\CustomerTreatmentSchedule */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="customer-treatment-schedule-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6 col-12">
            <?= Select2::widget([
                'model' => $model,
                'attribute' => 'customer_id',
                'data' => ArrayHelper::map(CustomerTable::getCustomerDongY(), 'id', 'name'),
                'options' => [
                    'class' => 'form-control load-data-on-change',
                    'load-data-element' => '#select-order',
                    'load-data-url' => Url::toRoute(['']),
                    'load-data-key' => 'customer_id',
                    'load-data-callback' => '',
                    'load-data-method' => 'GET'
                ]
            ]) ?>
        </div>
        <div class="col-md-6 col-12" id="select-order-content">
            <?= Select2::widget([
                'model' => $model,
                'attribute' => 'order_id',
                'data' => ArrayHelper::map(CustomerOrderTable::getOrderUnFinishByCustomer($model->customer_id), 'id', 'ordered_at'),
                'options' => []
            ]) ?>
        </div>
    </div>
    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'time_start')->textInput() ?>

    <?= $form->field($model, 'time_end')->textInput() ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(CustomerModule::t('customer', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
