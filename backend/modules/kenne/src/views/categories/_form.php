<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\kenne\KenneModule;

/* @var $this yii\web\View */
/* @var $model modava\kenne\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="categories-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'cat_slug')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'cat_name')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'cat_status')->textInput() ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

		<?= $form->field($model, 'updated_at')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton(KenneModule::t('kenne', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
