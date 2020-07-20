<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\comment\CommentModule;

/* @var $this yii\web\View */
/* @var $model modava\comment\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="comment-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'table_name')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'table_id')->textInput() ?>

		<?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

		<?= $form->field($model, 'created_by')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton(CommentModule::t('comment', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
