<?php

use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\location\LocationModule;
use yii\helpers\ArrayHelper;
use modava\location\models\table\LocationCountryTable;
use modava\location\models\table\LocationProvinceTable;

/* @var $this yii\web\View */
/* @var $model modava\location\models\LocationDistrict */
/* @var $form yii\widgets\ActiveForm */

if ($model->ProvinceId != null) $model->countryId = $model->provinceHasOne->countryHasOne->id;
?>
<?php ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="location-district-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'Type')->dropDownList(Yii::$app->getModule('location')->params['district-type'], []) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'LatiLongTude')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'countryId')->dropDownList(ArrayHelper::map(LocationCountryTable::getAllCountry(Yii::$app->language), 'id', 'CommonName'), [
                'prompt' => Yii::t('backend', 'Chọn quốc gia...'),
                'class' => 'form-control load-data-on-change',
                'load-data-url' => Url::toRoute(['/location/location-province/get-province-by-country']),
                'load-data-element' => '#select-province',
                'load-data-key' => 'country',
                'load-data-method' => 'GET',
                'load-data-callback' => '$("#select-province").select2();'
            ])->label('Quốc gia') ?>
        </div>
        <div class="col-6">
            <?php
            echo modava\select2\Select2::widget([
                'model' => $model,
                'attribute' => 'ProvinceId',
                'data' => ArrayHelper::map(LocationProvinceTable::getProvinceByCountry($model->countryId), 'id', 'name'),
                'label' => 'Tỉnh/Thành phố',
                'options' => [
                    'prompt' => 'Chọn tỉnh/thành phố...',
                    'id' => 'select-province'
                ]
            ]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'SortOrder')->textInput() ?>
        </div>
        <div class="col-6">
<<<<<<< HEAD
            <?= $form->field($model, 'language')->dropDownList(Yii::$app->getModule('location')->params['availableLocales'], ['prompt' => 'Chọn ngôn ngữ...']) ?>
=======
            <?= $form->field($model, 'language')->dropDownList(Yii::$app->params['availableLocales'], ['prompt' => 'Chọn ngôn ngữ...']) ?>
>>>>>>> master
        </div>
    </div>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>