<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\blogs\BlogsModule;

/* @var $this yii\web\View */
/* @var $model modava\blogs\models\Blogs */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="blogs-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'descriptions')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'date')->textInput() ?>

		<?= $form->field($model, 'comments')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'search')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'recent_post')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(BlogsModule::t('blogs', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
