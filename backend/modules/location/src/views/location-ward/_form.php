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

if ($model->DistrictID !== null) {
    $model->provinceId = $model->districtHasOne->provinceHasOne->id;
    $model->countryId = $model->districtHasOne->provinceHasOne->countryHasOne->id;
}
?>
<?php ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="location-ward-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Type')->dropDownList([
        'Phường' => 'Phường',
        'Xã' => 'Xã',
        'Thị Trấn' => 'Thị Trấn'
    ], []) ?>

    <?= $form->field($model, 'LatiLongTude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'countryId')->dropDownList(ArrayHelper::map(LocationCountryTable::getAllCountry(Yii::$app->language), 'id', 'CommonName'), [
        'prompt' => LocationModule::t('location', 'Chọn quốc gia...'),
        'class' => 'form-control load-data',
        'self-key' => 'country',
        'url-load-data' => Url::toRoute(['/location/location-province/get-province-by-country']),
        'element-load-data' => '#select-province',
        'method-load' => 'GET'
    ]) ?>

    <?= $form->field($model, 'provinceId')->dropdownList(ArrayHelper::map(LocationProvinceTable::getProvinceByCountry($model->countryId, Yii::$app->language), 'id', 'name'), [
        'prompt' => LocationModule::t('location', 'Chọn tỉnh/thành phố...'),
        'id' => 'select-province',
        'class' => 'form-control load-data',
        'self-key' => 'province',
        'url-load-data' => Url::toRoute(['/location/location-district/get-district-by-province']),
        'element-load-data' => '#select-district',
        'method-load' => 'GET'
    ]) ?>

    <?= $form->field($model, 'DistrictID')->dropDownList(ArrayHelper::map(LocationDistrictTable::getDistrictByProvince($model->provinceId, Yii::$app->language), 'id', 'name'), [
        'prompt' => LocationModule::t('location', 'Chọn phường/xã...'),
        'id' => 'select-district'
    ]) ?>

    <?= $form->field($model, 'SortOrder')->textInput() ?>

    <?= $form->field($model, 'language')->dropDownList(['vi' => 'Vi', 'en' => 'En', 'jp' => 'Jp',], ['prompt' => '']) ?>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(LocationModule::t('location', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>