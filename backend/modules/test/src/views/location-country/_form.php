<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\test\TestModule;

/* @var $this yii\web\View */
/* @var $model modava\test\models\LocationCountry */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="location-country-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'CountryCode')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'CommonName')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'FormalName')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'CountryType')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'CountrySubType')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'Sovereignty')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'Capital')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'CurrencyCode')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'CurrencyName')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'TelephoneCode')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'CountryCode3')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'CountryNumber')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'InternetCountryCode')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'SortOrder')->textInput() ?>

		<?= $form->field($model, 'status')->textInput() ?>

		<?= $form->field($model, 'language')->dropDownList([ 'vi' => 'Vi', 'en' => 'En', 'jp' => 'Jp', ], ['prompt' => '']) ?>

		<?= $form->field($model, 'Flags')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'IsDeleted')->textInput() ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

		<?= $form->field($model, 'updated_at')->textInput() ?>

		<?= $form->field($model, 'created_by')->textInput() ?>

		<?= $form->field($model, 'updated_by')->textInput() ?>

		<?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
		<?= $form->field($model, 'status')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton(TestModule::t('test', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
