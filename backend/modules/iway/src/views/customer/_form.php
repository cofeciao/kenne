<?php

use modava\datetime\DateTimePicker;
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

$model->birthday = $model->birthday != null
    ? date('d-m-Y', strtotime($model->birthday))
    : '';
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="customer-form">
    <?php $form = ActiveForm::begin(['id' => 'iway-customer']); ?>
    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title"><?= Yii::t('backend', 'Thông tin chung') ?></h5>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'sex')->dropDownList($model->getDropdown('sex'), [
                    'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'birthday')->widget(DateTimePicker::class, [
                    'template' => '{input}{button}',
                    'pickButtonIcon' => 'btn btn-increment btn-light',
                    'pickIconContent' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-th']),
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy',
                        'todayHighLight' => true,
                        'endDate' => '+0d'
                    ]
                ]) ?>
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
                <?= $form->field($model, 'online_source')->dropDownList($model->getDropdown('online_source'), [
                    'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'who_created')->dropDownList($model->getDropdown('who_created'), [
                    'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'fb_fanpage')->dropDownList($model->getDropdown('fb_fanpage'), [
                    'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                ]) ?>
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

<?php

$script = <<< JS
const sourceOnlineFbPageDropdownConfig = {
    'facebook' : [
        {
            key: 'my_auris_1',
            value: 'My Auris 1'
        },
        {
            key: 'my_auris_2',
            value: 'My Auris 2'
        },
        {
            key: 'iway',
            value: 'Iway'
        }
    ],
    'google' : []
};

function handleLoadDropdownDependency(parentEle, ele, dropdownConfig) {
    let parentDropdown = Object.keys(dropdownConfig),
        childDropdown = [],
        eleValue = ele.val(),
        needTrigger = true;
    
    if (parentDropdown.includes(parentEle.val())) {
        childDropdown = dropdownConfig[parentEle.val()];
    }
    
    let emptyOption = `<option value="">Chọn một giá trị ...</option>`;    
    
    /* Refresh option of dropdown */
    ele.html(emptyOption);
    childDropdown.forEach((item, index, array) => {
        ele.append(`<option value="` + item.key + `">` + item.value + `</option>`);
        if (item.key == eleValue) needTrigger = false;
    });
    
    if (needTrigger) ele.val('').trigger('change');
};

$(function () {
    handleLoadDropdownDependency($('#iway-customer [name="Customer[online_source]"]'), $('#iway-customer [name="Customer[fb_fanpage]"]'), sourceOnlineFbPageDropdownConfig);
    $('#iway-customer [name="Customer[online_source]"]').on('change', function() {
        handleLoadDropdownDependency($('#iway-customer [name="Customer[online_source]"]'), $('#iway-customer [name="Customer[fb_fanpage]"]'), sourceOnlineFbPageDropdownConfig);
    });
});
JS;

$this->registerJs($script, \yii\web\View::POS_END);