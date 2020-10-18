<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\kenne\KenneModule;

/* @var $this yii\web\View */
/* @var $model modava\kenne\models\Logo */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="logo-form">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'file')->fileInput() ?>

        <?= $form->field($model, 'status')->dropDownList(
                [
                        0 => 'Không Hoạt Động',
                        1 => 'Hoạt Động'
                ],
                [
                        'prompt' => 'Trạng Thái'
                ]
        ) ?>

		<?= $form->field($model, 'link_logo')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(KenneModule::t('kenne', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
