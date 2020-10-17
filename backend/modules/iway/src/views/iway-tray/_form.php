<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\iway\models\IwayTray;
use modava\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model IwayTray */
/* @var $form yii\widgets\ActiveForm */

$status = $model->status;
$status_options = [];
$status_enabled = $model->getStatusEnabled($model->status);
foreach (IwayTray::STATUS as $status_key => $tray_status) {
    if (!array_key_exists($status_key, $status_enabled)) {
        $status_options[$status_key] = [
            'disabled' => 'disabled'
        ];
    } else {
        $status_options[$status_key] = [];
    }
}
$result = $model->result;
$result_options = [];
$result_enabled = $model->getResultEnabled($model->result);
foreach (IwayTray::RESULT as $result_key => $tray_result) {
    if (!array_key_exists($result_key, $result_enabled)) {
        $result_options[$result_key] = [
            'disabled' => 'disabled'
        ];
    } else {
        $result_options[$result_key] = [];
    }
}
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
    <div class="iway-tray-form">
        <?php $form = ActiveForm::begin([
//        'enableAjaxValidation' => true,
//        'validationUrl' => Url::toRoute(['validate-iway-tray', 'id' => $model->primaryKey])
        ]); ?>

        <div class="row">
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <?= $form->field($model, 'note')->widget(\modava\tiny\TinyMce::class, [
            'options' => ['rows' => 12],
            'type' => 'content'
        ]) ?>

        <div class="row">
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'date_delivery')->widget(DateTimePicker::class, [
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
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'user_delivery')->dropDownList([], []) ?>
            </div>
        </div>

        <?= $form->field($model, 'treatment_schedule_id')->textInput() ?>

        <div class="row">
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'espect_date_begin')->widget(DateTimePicker::class, [
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
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'espect_date_end')->widget(DateTimePicker::class, [
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
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'date_begin')->widget(DateTimePicker::class, [
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
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'date_end')->widget(DateTimePicker::class, [
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
        </div>


        <div class="row">
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'status')->dropDownList(IwayTray::STATUS, [
                    'id' => 'tray-status',
                    'options' => $status_options
                ]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'result')->dropDownList(IwayTray::RESULT, [
                    'id' => 'tray-result',
                    'options' => $result_options,
                    'onchange' => '$(this).val()=="'.IwayTray::CHUA_DANH_GIA.'"?$(".evaluate-content").hide():$(".evaluate-content").show()'
                ]) ?>
            </div>
        </div>
        <div class="col-12 px-0 evaluate-content"
             style="display: <?= $model->result == IwayTray::CHUA_DANH_GIA ? 'none' : 'block' ?>">
            <?= $form->field($model, 'evaluate')->textarea([
                'rows' => 6
            ]) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
<?php
$giao_khach_hang = IwayTray::GIAO_KHACH_HANG;
$chua_danh_gia = IwayTray::CHUA_DANH_GIA;
$script = <<< JS
    $('#tray-status').on('change', function(){
        if($(this).val() !== '$giao_khach_hang'){
            $('#tray-result option[value!="$chua_danh_gia"]').removeAttr('selected').attr('disabled', 'disabled').prop('selected', false);
        } else {
            $('#tray-result option[value!="$chua_danh_gia"]').removeAttr('disabled');
        }
    });
JS;
$this->registerJs($script, \yii\web\View::POS_END);