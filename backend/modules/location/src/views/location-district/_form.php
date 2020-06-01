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
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Type')->dropDownList([
        'Quận' => 'Quận',
        'Huyện' => 'Huyện',
        'Thị Xã' => 'Thị Xã'
    ], []) ?>

    <?= $form->field($model, 'LatiLongTude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'countryId')->dropDownList(ArrayHelper::map(LocationCountryTable::getAllCountry(Yii::$app->language), 'id', 'CommonName'), [
        'prompt' => LocationModule::t('location', 'Chọn quốc gia...'),
        'class' => 'form-control load-data',
        'url-load-data' => Url::toRoute(['/location/location-province/get-province-by-country']),
        'element-load-data' => '#select-province',
        'self-key' => 'country',
        'method-load' => 'GET'
    ]) ?>

    <?= $form->field($model, 'ProvinceId')->dropDownList(ArrayHelper::map(LocationProvinceTable::getProvinceByCountry(($model->provinceHasOne != null ? $model->provinceHasOne->countryHasOne->id : null), Yii::$app->language), 'id', 'name'), [
        'prompt' => LocationModule::t('location', 'Chọn tỉnh/thành phố'),
        'id' => 'select-province'
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