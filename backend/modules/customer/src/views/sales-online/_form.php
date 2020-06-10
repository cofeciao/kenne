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
                <?= $form->field($model, 'sex')->dropDownList(CustomerTable::SEX, []) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <?= Select2::widget([
                    'model' => $model,
                    'attribute' => 'country',
                    'data' => ArrayHelper::map(LocationCountryTable::getAllCountry(Yii::$app->language), 'id', 'CommonName'),
                    'options' => [
                        'class' => 'form-control load-data-on-change',
                        'prompt' => CustomerModule::t('customer', 'Country'),
                        'load-data-element' => '#select-province',
                        'load-data-url' => Url::toRoute(['/location/location-province/get-province-by-country']),
                        'load-data-key' => 'country',
                        'load-data-method' => 'GET',
                        'load-data-callback' => '$("#select-province").select2();'
                    ]
                ]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= Select2::widget([
                    'model' => $model,
                    'attribute' => 'province',
                    'data' => ArrayHelper::map(LocationProvinceTable::getProvinceByCountry($model->country, Yii::$app->language), 'id', 'name'),
                    'options' => [
                        'id' => 'select-province',
                        'class' => 'form-control load-data-on-change',
                        'prompt' => CustomerModule::t('customer', 'Province'),
                        'load-data-element' => '#select-district',
                        'load-data-url' => Url::toRoute(['/location/location-district/get-district-by-province']),
                        'load-data-key' => 'province',
                        'load-data-method' => 'GET',
                        'load-data-callback' => '$("#select-district").select2();'
                    ]
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <?= Select2::widget([
                    'model' => $model,
                    'attribute' => 'district',
                    'data' => ArrayHelper::map(LocationDistrictTable::getDistrictByProvince($model->province, Yii::$app->language), 'id', 'name'),
                    'options' => [
                        'prompt' => CustomerModule::t('customer', 'District'),
                        'id' => 'select-district',
                        'class' => 'form-control load-data-on-change',
                        'load-data-element' => '#select-ward',
                        'load-data-url' => Url::toRoute(['/location/location-ward/'])
                    ]
                ]) ?>
                <?= $form->field($model, 'district')->textInput() ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'ward')->textInput() ?>
            </div>
        </div>
        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        <div class="row">
            <div class="col-md-6 col-12"></div>
            <div class="col-md-6 col-12"></div>
        </div>


        <?= $form->field($model, 'fanpage_id')->textInput() ?>

        <?= $form->field($model, 'permission_user')->textInput() ?>

        <?= Select2::widget([
            'model' => $model,
            'attribute' => 'status_call',
            'data' => ArrayHelper::map(CustomerStatusCallTable::getAllStatysCall(), 'id', 'name'),
            'options' => [
                'prompt' => 'Trạng thái gọi...'
            ]
        ]) ?>

        <?= Select2::widget([
            'model' => $model,
            'attribute' => 'status_fail',
            'data' => ArrayHelper::map(CustomerStatusFailTable::getAllStatusFail(), 'id', 'name'),
            'options' => [
                'prompt' => 'Lý do fail...'
            ]
        ]) ?>

        <?= $form->field($model, 'status_dat_hen')->textInput() ?>

        <?= $form->field($model, 'status_dong_y')->textInput() ?>

        <?= $form->field($model, 'time_lich_hen')->textInput() ?>

        <?= $form->field($model, 'time_come')->textInput() ?>

        <?= $form->field($model, 'direct_sale')->textInput() ?>

        <?= $form->field($model, 'co_so')->textInput() ?>

        <?= $form->field($model, 'sale_online_note')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'direct_sale_note')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(CustomerModule::t('customer', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
<?php
$script = <<< JS
var form = $('#form-sales-online');
form.on('submit', function(e){
    e.preventDefault();
    return false;
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);