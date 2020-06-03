<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\location\LocationModule;
use yii\helpers\ArrayHelper;
use modava\location\models\table\LocationCountryTable;

/* @var $this yii\web\View */
/* @var $model modava\location\models\LocationProvince */
/* @var $form yii\widgets\ActiveForm */
?>
<?php ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="location-province-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'Type')->dropDownList([
                'Thành Phố' => 'Thành Phố',
                'Tỉnh' => 'Tỉnh',
            ], []) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'TelephoneCode')->textInput() ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'ZipCode')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'CountryId')->dropDownList(ArrayHelper::map(LocationCountryTable::getAllCountry(Yii::$app->language), 'id', 'CommonName'), [
                'prompt' => LocationModule::t('location', 'Chọn quốc gia...')
            ])->label('Quốc gia') ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'SortOrder')->textInput() ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'language')->dropDownList(Yii::$app->getModule('location')->params['availableLocales'], ['prompt' => 'Chọn ngôn ngữ...']) ?>
        </div>
    </div>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(LocationModule::t('location', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
