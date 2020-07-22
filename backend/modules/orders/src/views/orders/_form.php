<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\orders\OrdersModule;

/* @var $this yii\web\View */
/* @var $model modava\orders\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="orders-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'id_tr')->textInput() ?>

		<?= $form->field($model, 'id_pro')->textInput() ?>

		<?= $form->field($model, 'or_quantity')->textInput() ?>

		<?= $form->field($model, 'or_price')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton(OrdersModule::t('orders', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
