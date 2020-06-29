<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\location\LocationModule;
use yii\helpers\ArrayHelper;
use modava\location\models\table\LocationProvinceTable;
use modava\location\models\table\LocationDistrictTable;
use modava\location\models\table\LocationCountryTable;

/* @var $this yii\web\View */
/* @var $model modava\location\models\LocationWard */
/* @var $form yii\widgets\ActiveForm */

if (Yii::$app->controller->action->id == 'update' && $model->DistrictID !== null) {
    $model->provinceId = $model->districtHasOne->provinceHasOne->id;
    $model->countryId = $model->districtHasOne->provinceHasOne->countryHasOne->id;
}
?>
<?php ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="location-ward-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'Type')->dropDownList(Yii::$app->getModule('location')->params['ward-type'], []) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'LatiLongTude')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'countryId')->dropDownList(ArrayHelper::map(LocationCountryTable::getAllCountry(Yii::$app->language), 'id', 'CommonName'), [
                'prompt' => LocationModule::t('location', 'Chọn quốc gia...'),
                'class' => 'form-control load-data-on-change',
                'load-data-key' => 'country',
                'load-data-url' => Url::toRoute(['/location/location-province/get-province-by-country']),
                'load-data-element' => '#select-province',
                'load-data-method' => 'GET'
            ])->label('Quốc gia') ?></div>
        <div class="col-6">
            <?php
            echo \common\widgets\Select2::widget([
                'model' => $model,
                'attribute' => 'provinceId',
                'data' => ArrayHelper::map(LocationProvinceTable::getProvinceByCountry(), 'id', 'name'),
                'options' => [
                    'prompt' => LocationModule::t('location', 'Chọn tỉnh/thành phố...'),
                    'id' => 'select-province',
                    'class' => 'form-control load-data-on-change',
                    'load-data-key' => 'province',
                    'load-data-url' => Url::toRoute(['/location/location-district/get-district-by-province']),
                    'load-data-element' => '#select-district',
                    'load-data-method' => 'GET'
                ],
                'label' => 'Tỉnh/Thành phố'
            ]);
            ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'DistrictID')->dropDownList(ArrayHelper::map(LocationDistrictTable::getDistrictByProvince($model->provinceId, Yii::$app->language), 'id', 'name'), [
                'prompt' => LocationModule::t('location', 'Chọn phường/xã...'),
                'id' => 'select-district'
            ])->label('Quận/Huyện') ?>
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
