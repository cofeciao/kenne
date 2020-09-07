<?php

use modava\location\models\table\LocationDistrictTable;
use modava\location\models\table\LocationProvinceTable;
use modava\location\models\table\LocationWardTable;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="customer-form">
    <?php $form = ActiveForm::begin(); ?>
    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title"><?=Yii::t('backend', 'Thông tin chung')?></h5>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'sex')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'birthday')->textInput() ?>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <?= $form->field($model,
                    'province_id')->dropDownList(ArrayHelper::map(LocationProvinceTable::getProvinceByCountry(237,
                    Yii::$app->language), 'id', 'name'), [
                    'id' => 'select-province',
                    'prompt' => Yii::t('backend', 'Chọn Tỉnh/Thành phố...'),
                    'class' => 'form-control load-data-on-change',
                    'load-data-element' => '#select-district',
                    'load-data-url' => Url::toRoute(['/location/location-district/get-district-by-province']),
                    'load-data-key' => 'province',
                    'load-data-data' => json_encode(['option_tag' => 'true']),
                    'load-data-method' => 'GET',
                    'load-data-callback' => '$("#select-ward").find("option[value!=\'\']").remove();'
                ]) ?>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <?= $form->field($model,
                    'district_id')->dropDownList(ArrayHelper::map(LocationDistrictTable::getDistrictByProvince($model->province_id,
                    Yii::$app->language), 'id', 'name'), [
                    'id' => 'select-district',
                    'prompt' => Yii::t('backend', 'Chọn Quận/Huyện...'),
                    'class' => 'form-control load-data-on-change',
                    'load-data-element' => '#select-ward',
                    'load-data-url' => Url::toRoute(['/location/location-ward/get-ward-by-district']),
                    'load-data-key' => 'district',
                    'load-data-data' => json_encode(['option_tag' => 'true']),
                    'load-data-method' => 'GET',
                ]) ?>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <?= $form->field($model,
                    'ward_id')->dropDownList(ArrayHelper::map(LocationWardTable::getWardByDistrict($model->district_id),
                    'id', 'name'), [
                    'prompt' => Yii::t('backend', 'Chọn Phường/Xã...'),
                    'id' => 'select-ward',
                ]) ?>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <?= $form->field($model, 'address')->textInput() ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'online_source')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'fb_fanpage')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'fb_customer')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'co_so_id')->textInput() ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'reason_fail')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'who_created')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>
        </div>
    </section>

    <section class="hk-sec-wrapper mt-4">
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'online_sales_id')->textInput() ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'online_sales_note')->textarea(['rows' => 6]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'direct_sales_id')->textInput() ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'direct_sales_note')->textarea(['rows' => 6]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'status_customer')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </section>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
