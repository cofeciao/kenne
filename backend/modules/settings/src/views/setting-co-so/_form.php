<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\settings\SettingsModule;

/* @var $this yii\web\View */
/* @var $model modava\settings\models\SettingCoSo */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="setting-co-so-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'language')->dropDownList([ 'vi' => 'Vi', 'en' => 'En', 'jp' => 'Jp'], []) ?>

		<?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
		<?= $form->field($model, 'status')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton(SettingsModule::t('settings', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
