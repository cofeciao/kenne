<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\iway\IwayModule;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="order-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'ordered_at')->textInput() ?>

		<?= $form->field($model, 'customer_id')->textInput() ?>

		<?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'co_so')->textInput() ?>

		<?= $form->field($model, 'total')->textInput() ?>

		<?= $form->field($model, 'discount')->textInput() ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

		<?= $form->field($model, 'updated_at')->textInput() ?>

		<?= $form->field($model, 'created_by')->textInput() ?>

		<?= $form->field($model, 'updated_by')->textInput() ?>

		<?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
		<?= $form->field($model, 'status')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton(IwayModule::t('iway', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
