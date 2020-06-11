<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Select2;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\customer\CustomerModule;
use yii\helpers\ArrayHelper;
use modava\customer\models\table\CustomerTable;
use modava\customer\models\table\CustomerStatusFailTable;
use modava\customer\models\table\CustomerStatusCallTable;
use dosamigos\datepicker\DatePicker;
use modava\location\models\table\LocationCountryTable;
use modava\location\models\table\LocationProvinceTable;
use modava\location\models\table\LocationDistrictTable;
use modava\location\models\table\LocationWardTable;
use modava\customer\models\table\CustomerAgencyTable;
use modava\customer\models\table\CustomerOriginTable;
use modava\customer\models\table\CustomerFanpageTable;

/* @var $this yii\web\View */
/* @var $model modava\customer\models\SalesOnline */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
    <div class="customer-form">
        <?php $form = ActiveForm::begin([
            'id' => 'form-sales-online',
            'enableAjaxValidation' => true,
            'validationUrl' => Url::toRoute(['validate-sales-online', 'id' => $model->primaryKey]),
            'action' => Url::toRoute([Yii::$app->controller->action->id, 'id' => $model->primaryKey])
        ]); ?>
        <div class="row">
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'birthday')->widget(DatePicker::class, [
                    'addon' => '<button type="button" class="btn btn-increment btn-light"><i class="ion ion-md-calendar"></i></button>',
                    'clientOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true
                    ]
                ]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'sex')->dropDownList(CustomerTable::SEX, [
                    'prompt' => CustomerModule::t('customer', 'Sex')
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'country')->dropDownList(ArrayHelper::map(LocationCountryTable::getAllCountry(Yii::$app->language), 'id', 'CommonName'), [
                    'prompt' => CustomerModule::t('customer', 'Country'),
                    'class' => 'form-control load-data-on-change',
                    'load-data-element' => '#select-province',
                    'load-data-url' => Url::toRoute(['/location/location-province/get-province-by-country']),
                    'load-data-key' => 'country',
                    'load-data-method' => 'GET',
                    'load-data-callback' => '$("#select-district, #select-ward").find("option[value!=\'\']").remove();'
                ]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'province')->dropDownList(ArrayHelper::map(LocationProvinceTable::getProvinceByCountry($model->country, Yii::$app->language), 'id', 'name'), [
                    'id' => 'select-province',
                    'prompt' => CustomerModule::t('customer', 'Province'),
                    'class' => 'form-control load-data-on-change',
                    'load-data-element' => '#select-district',
                    'load-data-url' => Url::toRoute(['/location/location-district/get-district-by-province']),
                    'load-data-key' => 'province',
                    'load-data-method' => 'GET',
                    'load-data-callback' => '$("#select-ward").find("option[value!=\'\']").remove();'
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'district')->dropDownList(ArrayHelper::map(LocationDistrictTable::getDistrictByProvince($model->province, Yii::$app->language), 'id', 'name'), [
                    'id' => 'select-district',
                    'prompt' => CustomerModule::t('customer', 'District'),
                    'class' => 'form-control load-data-on-change',
                    'load-data-element' => '#select-ward',
                    'load-data-url' => Url::toRoute(['/location/location-ward/get-ward-by-district']),
                    'load-data-key' => 'district',
                    'load-data-method' => 'GET',
                ]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'ward')->dropDownList(ArrayHelper::map(LocationWardTable::getWardByDistrict($model->district), 'id', 'name'), [
                    'prompt' => CustomerModule::t('customer', 'Ward'),
                    'id' => 'select-ward',
                ]) ?>
            </div>
        </div>
        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        <div class="row">
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'agency')->dropDownList(ArrayHelper::map(CustomerAgencyTable::getAllAgency(), 'id', 'name'), [
                    'prompt' => CustomerModule::t('customer', 'Agency'),
                    'class' => 'form-control load-data-on-change',
                    'load-data-url' => Url::toRoute(['/customer/customer-origin/get-origin-by-agency']),
                    'load-data-element' => '#select-origin',
                    'load-data-key' => 'agency',
                    'load-data-method' => 'GET',
                    'load-data-callback' => '$("#select-fanpage").find("option[value!=\'\']").remove();'
                ]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'origin')->dropDownList(ArrayHelper::map(CustomerOriginTable::getOriginByAgency($model->agency), 'id', 'name'), [
                    'prompt' => CustomerModule::t('customer', 'Origin'),
                    'id' => 'select-origin',
                    'class' => 'form-control load-data-on-change',
                    'load-data-url' => Url::toRoute(['/customer/customer-fanpage/get-fanpage-by-origin']),
                    'load-data-element' => '#select-fanpage',
                    'load-data-key' => 'origin',
                    'load-data-method' => 'GET'
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'fanpage_id')->dropDownList(ArrayHelper::map(CustomerFanpageTable::getFanpageByOrigin($model->origin), 'id', 'name'), [
                    'prompt' => CustomerModule::t('customer', 'Fanpage'),
                    'id' => 'select-fanpage'
                ]) ?>
            </div>
        </div>
        <?= $form->field($model, 'status_call')->dropDownList(ArrayHelper::map(CustomerStatusCallTable::getAllStatysCall(), 'id', 'name'), [
            'id' => 'status_call',
            'prompt' => 'Trạng thái gọi...'
        ]) ?>

        <?= $form->field($model, 'status_fail')->dropDownList(ArrayHelper::map(CustomerStatusFailTable::getAllStatusFail(), 'id', 'name'), [
            'prompt' => 'Lý do fail...'
        ]) ?>

        <?= $form->field($model, 'time_lich_hen')->textInput() ?>

        <?= $form->field($model, 'co_so')->textInput() ?>

        <?= $form->field($model, 'sale_online_note')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(CustomerModule::t('customer', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
<?php
$script = <<< JS
/*var form = $('#form-sales-online');
form.on('submit', function(e){
    e.preventDefault();
    return false;
});
$(function(){
    $('#select-country').trigger('change');
});*/
JS;
$this->registerJs($script, \yii\web\View::POS_END);