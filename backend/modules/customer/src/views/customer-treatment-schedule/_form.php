<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\customer\CustomerModule;

/* @var $this yii\web\View */
/* @var $model modava\customer\models\CustomerTreatmentSchedule */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="customer-treatment-schedule-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'order_id')->textInput() ?>

		<?= $form->field($model, 'co_so')->textInput() ?>

		<?= $form->field($model, 'time_start')->textInput() ?>

		<?= $form->field($model, 'time_end')->textInput() ?>

		<?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

		<?= $form->field($model, 'updated_at')->textInput() ?>

		<?= $form->field($model, 'created_by')->textInput() ?>

		<?= $form->field($model, 'updated_by')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton(CustomerModule::t('customer', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
