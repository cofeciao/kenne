<?php

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Call */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="call-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'customer_id')->textInput() ?>

		<?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'start_time')->textInput() ?>

		<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

		<?= $form->field($model, 'created_by')->textInput() ?>

		<?= $form->field($model, 'updated_at')->textInput() ?>

		<?= $form->field($model, 'updated_by')->textInput() ?>

		<?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
		<?= $form->field($model, 'status')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
