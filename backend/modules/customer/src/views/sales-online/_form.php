<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Select2;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\customer\CustomerModule;
use yii\helpers\ArrayHelper;
use modava\customer\models\table\CustomerTable;
use modava\customer\models\table\CustomerStatusFailTable;
use modava\customer\models\table\CustomerStatusCallTable;

/* @var $this yii\web\View */
/* @var $model modava\customer\models\SalesOnline */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
    <div class="customer-form">
        <?php $form = ActiveForm::begin([
            'id' => 'form-sales-online',
            'enableAjaxValidation' => true,
            'validationUrl' => Url::toRoute(['validate-sales-online', 'id' => $model->primaryKey]),
            'action' => Url::toRoute([Yii::$app->controller->action->id, 'id' => $model->primaryKey])
        ]); ?>
        <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'birthday')->textInput() ?>

        <?= $form->field($model, 'sex')->dropDownList(CustomerTable::SEX, []) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ward')->textInput() ?>

        <?= $form->field($model, 'fanpage_id')->textInput() ?>

        <?= $form->field($model, 'permission_user')->textInput() ?>

        <?= Select2::widget([
            'model' => $model,
            'attribute' => 'status_call',
            'data' => ArrayHelper::map(CustomerStatusCallTable::getAllStatysCall(), 'id', 'name'),
            'options' => []
        ]) ?>

        <?= Select2::widget([
            'model' => $model,
            'attribute' => 'status_fail',
            'data' => ArrayHelper::map(CustomerStatusFailTable::getAllStatusFail(), 'id', 'name'),
            'options' => [
                'prompt' => 'Lý do fail'
            ]
        ]) ?>

        <?= $form->field($model, 'status_dat_hen')->textInput() ?>

        <?= $form->field($model, 'status_dong_y')->textInput() ?>

        <?= $form->field($model, 'time_lich_hen')->textInput() ?>

        <?= $form->field($model, 'time_come')->textInput() ?>

        <?= $form->field($model, 'direct_sale')->textInput() ?>

        <?= $form->field($model, 'co_so')->textInput() ?>

        <?= $form->field($model, 'sale_online_note')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'direct_sale_note')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(CustomerModule::t('customer', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
<?php
$script = <<< JS
var form = $('#form-sales-online');
form.on('submit', function(e){
    e.preventDefault();
    return false;
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);