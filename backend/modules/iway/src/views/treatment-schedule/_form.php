<?php

use backend\widgets\ToastrWidget;
use kartik\select2\Select2;
use modava\iway\models\Order;
use modava\tiny\TinyMce;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\TreatmentSchedule */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="treatment-schedule-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'status')->dropDownList($model->getDropdown('status'), [
                    'prompt' => Yii::t('backend', 'Chọn một giá trị')
            ]) ?>
        </div>
        <div class="col-6">

            <?= $form->field($model, 'order_id')->widget(Select2::class, [
                'value' => $model->order_id,
                'initValueText' => $model->order_id ? Order::findOne($model->order_id)->title : '',
                'options' => ['placeholder' => Yii::t('backend', 'Chọn một giá trị ...')],
                'pluginOptions' => [
                    'allowClear' => true,
                    'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => Url::toRoute(['/iway/order/get-by-key-word']),
                        'dataType' => 'json',
                        'delay' => 250,
                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateResult' => new JsExpression('function(model) { return model.text; }'),
                    'templateSelection' => new JsExpression('function (model) { return model.text; }'),
                ],
            ]); ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'description')->widget(TinyMce::class, [
                'options' => ['rows' => 12],
                'type' => 'content'
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
