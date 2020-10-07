<?php

use backend\widgets\ToastrWidget;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use modava\iway\helpers\Utils;
use modava\iway\models\table\CoSoTable;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Order */
/* @var $form yii\widgets\ActiveForm */

if (!$model->primaryKey) {
    $model->order_date = date('d-m-Y');
    $model->status = 'moi';
} else {
    $model->order_date = Utils::convertDateToDisplayFormat($model->order_date);
}

?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="order-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'co_so_id')->dropDownList(ArrayHelper::map(CoSoTable::getAll(), 'id', 'title'), [
                'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
            ]) ?>
        </div>
        <div class="col-6">

            <?= $form->field($model, 'customer_id')->widget(Select2::class, [
                'value' => $model->customer_id,
                'initValueText' => $model->customer_id ? $model->customer->fullname : '',
                'options' => ['placeholder' => Yii::t('backend', 'Chọn một giá trị ...')],
                'pluginOptions' => [
                    'allowClear' => true,
                    'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => Url::toRoute(['/iway/customer/get-customer-by-key-word']),
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateResult' => new JsExpression('function(model) { return model.text; }'),
                    'templateSelection' => new JsExpression('function (model) { return model.text; }'),
                ],
            ]); ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'order_date')->widget(DatePicker::class, [
                'addon' => '<button type="button" class="btn btn-increment btn-light"><i class="ion ion-md-calendar"></i></button>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy',
                    'todayHighlight' => true,
                ]
            ]) ?>
        </div>
        <div class="col-6">

            <?= $form->field($model, 'status')->dropDownList($model->getDropdown('status'), [
                'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
            ]) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'payment_status')->dropDownList($model->getDropdown('payment_status'), [
                'prompt' => Yii::t('backend', 'Chọn một giá trị ...'),
                'disabled' => true
            ]) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'service_status')->dropDownList($model->getDropdown('service_status'), [
                'prompt' => Yii::t('backend', 'Chọn một giá trị ...'),
                'disabled' => true
            ]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'final_total')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
