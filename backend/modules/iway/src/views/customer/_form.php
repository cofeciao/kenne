<?php

use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use modava\auth\models\User;
use modava\auth\models\UserProfile;
use modava\iway\models\table\CustomerTable;
use modava\location\models\table\LocationCountryTable;
use modava\location\models\table\LocationDistrictTable;
use modava\location\models\table\LocationProvinceTable;
use modava\location\models\table\LocationWardTable;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\iway\IwayModule;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="customer-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Thông tin chung</h5>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'birthday')->widget(DatePicker::class, [
                    'addon' => '<button type="button" class="btn btn-increment btn-light"><i class="ion ion-md-calendar"></i></button>',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true,
                        'endDate' => '+0d'
                    ]
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'sex')->dropDownList($model->getDropdown('sex'), ['prompt' => IwayModule::t('iway', 'Chọn một giá trị ...')]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'fanpage_id')->widget(Select2::class, [
                    'options' => ['placeholder' => 'Gõ để tìm ...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => Url::toRoute(['fanpage/fanpage-list']),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(record) { return record.name; }'),
                        'templateSelection' => new JsExpression('function (record) { return record.name; }'),
                    ],
                ]); ?>
            </div>
            <div class="col-6">
                <?php
                if (isset(Yii::$app->user->identity->co_so)) $model->co_so = Yii::$app->user->identity->co_so;
                ?>
                <?= $form->field($model, 'co_so')->dropDownList(ArrayHelper::map(CustomerTable::getAllCoSo(), 'id', 'name'), [
                    'prompt' => IwayModule::t('customer', 'Chọn một giá trị ...'),
                    'id' => 'co-so'
                ]) ?>
            </div>
        </div>
    </div>
    <div class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Thông tin quản lý</h5>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model,
                    'country_id')->dropDownList(ArrayHelper::map(LocationCountryTable::getAllCountry(Yii::$app->language),
                    'id', 'CommonName'), [
                    'prompt' => IwayModule::t('customer', 'Chọn quốc gia...'),
                    'class' => 'form-control load-data-on-change',
                    'load-data-element' => '#select-province',
                    'load-data-url' => Url::toRoute(['/location/location-province/get-province-by-country']),
                    'load-data-key' => 'country',
                    'load-data-data' => json_encode(['option_tag' => 'true']),
                    'load-data-method' => 'GET',
                    'load-data-callback' => '$("#select-district, #select-ward").find("option[value!=\'\']").remove();',
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model,
                    'province_id')->dropDownList(ArrayHelper::map(LocationProvinceTable::getProvinceByCountry($model->country_id,
                    Yii::$app->language), 'id', 'name'), [
                    'id' => 'select-province',
                    'prompt' => IwayModule::t('customer', 'Chọn Tỉnh/Thành phố...'),
                    'class' => 'form-control load-data-on-change',
                    'load-data-element' => '#select-district',
                    'load-data-url' => Url::toRoute(['/location/location-district/get-district-by-province']),
                    'load-data-key' => 'province',
                    'load-data-data' => json_encode(['option_tag' => 'true']),
                    'load-data-method' => 'GET',
                    'load-data-callback' => '$("#select-ward").find("option[value!=\'\']").remove();'
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model,
                    'district_id')->dropDownList(ArrayHelper::map(LocationDistrictTable::getDistrictByProvince($model->province_id,
                    Yii::$app->language), 'id', 'name'), [
                    'id' => 'select-district',
                    'prompt' => IwayModule::t('customer', 'Chọn Quận/Huyện...'),
                    'class' => 'form-control load-data-on-change',
                    'load-data-element' => '#select-ward',
                    'load-data-url' => Url::toRoute(['/location/location-ward/get-ward-by-district']),
                    'load-data-key' => 'district',
                    'load-data-data' => json_encode(['option_tag' => 'true']),
                    'load-data-method' => 'GET',
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model,
                    'ward_id')->dropDownList(ArrayHelper::map(LocationWardTable::getWardByDistrict($model->district_id),
                    'id', 'name'), [
                    'prompt' => IwayModule::t('customer', 'Chọn Phường/Xã...'),
                    'id' => 'select-ward',
                ]) ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'address')->textarea(['rows' => 2]) ?>
            </div>
        </div>
    </div>
    <div class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Thông tin quản lý</h5>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'type')->dropDownList($model->getDropdown('type'), ['prompt' => IwayModule::t('iway', 'Chọn một giá trị ...')]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'status')->textInput() ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'online_sales_id')->widget(Select2::class,
                    [
                        'options' => ['placeholder' => 'Chọn một giá trị ...'],
                        'data' => ArrayHelper::map(User::getUserByRole('online_sales', [User::tableName() . '.id', UserProfile::tableName() . '.fullname']), 'id', 'fullname'),
                        'value' => $model->online_sales_id
                    ]) ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'sale_online_note')->widget(\modava\tiny\TinyMce::class, [
                    'options' => ['rows' => 6],
                    'type' => 'content'
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'direct_sale_id')->widget(Select2::class,
                    [
                        'options' => ['placeholder' => 'Chọn một giá trị ...'],
                        'data' => ArrayHelper::map(User::getUserByRole('direct_sale', [User::tableName() . '.id', UserProfile::tableName() . '.fullname']), 'id', 'fullname'),
                        'value' => $model->direct_sale_id
                    ]) ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'direct_sale_note')->widget(\modava\tiny\TinyMce::class, [
                    'options' => ['rows' => 6],
                    'type' => 'content'
                ]) ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(IwayModule::t('iway', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
