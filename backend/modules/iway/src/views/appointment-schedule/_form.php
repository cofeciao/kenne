<?php

use kartik\select2\Select2;
use modava\datetime\DateTimePicker;
use modava\iway\models\table\CoSoTable;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\AppointmentSchedule */
/* @var $form yii\widgets\ActiveForm */

$model->start_time = $model->start_time != null
    ? date('d-m-Y H:i', strtotime($model->start_time))
    : '';
$model->check_in_time = $model->check_in_time != null
    ? date('d-m-Y H:i', strtotime($model->check_in_time))
    : '';
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="appointment-schedule-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
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
            <?= $form->field($model, 'co_so_id')->dropDownList(ArrayHelper::map(CoSoTable::getAll(), 'id', 'title'), [
                'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
            ]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'start_time')->widget(DateTimePicker::class, [
                'template' => '{input}{button}',
                'pickButtonIcon' => 'btn btn-increment btn-light',
                'pickIconContent' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-th']),
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy hh:ii',
                    'todayHighLight' => true,
                ]
            ]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'status')->dropDownList($model->getDropdown('status'), [
                'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
            ]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'status_service')->dropDownList($model->getDropdown('status_service'), [
                'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
            ]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'reason_fail')->dropDownList($model->getDropdown('reason_fail'), [
                'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
            ]) ?>
        </div>
        <div class="col-6">

            <?= $form->field($model, 'check_in_time')->widget(DateTimePicker::class, [
                'template' => '{input}{button}',
                'pickButtonIcon' => 'btn btn-increment btn-light',
                'pickIconContent' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-th']),
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy hh:ii',
                    'todayHighLight' => true,
                ]
            ]) ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'description')->widget(\modava\tiny\TinyMce::class, [
                'options' => ['rows' => 12],
                'type' => 'content'
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
