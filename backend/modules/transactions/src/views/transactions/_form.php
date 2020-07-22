<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\transactions\TransactionsModule;

/* @var $this yii\web\View */
/* @var $model modava\transactions\models\Transactions */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="transactions-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'tr_id_customer')->textInput() ?>

		<?= $form->field($model, 'tr_name')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'tr_address')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'tr_phone')->textInput() ?>

		<?= $form->field($model, 'tr_status')->textInput() ?>

		<?= $form->field($model, 'tr_total')->textInput() ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

		<?= $form->field($model, 'updated_at')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton(TransactionsModule::t('transactions', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
