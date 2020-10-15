<?php

use backend\widgets\ToastrWidget;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use modava\auth\models\User;
use modava\auth\models\UserProfile;
use modava\datetime\DateTimePicker;
use modava\iway\helpers\Utils;
use modava\iway\models\table\CoSoTable;
use modava\location\models\table\LocationDistrictTable;
use modava\location\models\table\LocationProvinceTable;
use modava\location\models\table\LocationWardTable;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Customer */
/* @var $form yii\widgets\ActiveForm */

$model->birthday = Utils::convertDateToDisplayFormat($model->birthday);

$user = \common\models\User::findOne(Yii::$app->user->id);

$btnListCall = '';
$btnListAS = '';

if ($model->primaryKey) {
    $btnListAS  = Html::a('<i class="icon dripicons-to-do"></i>', Url::toRoute(['appointment-schedule/index', 'AppointmentScheduleSearch[customer_id]' => $model->primaryKey]), [ 'class' => 'btn btn-info', 'target' => '_blank', 'title' => 'Danh sách Lịch hẹn' ]);
    $btnListCall = Html::a('<i class="icon dripicons-phone"></i>', Url::toRoute(['call/index', 'CallSearch[customer_id]' => $model->primaryKey]), [ 'class' => 'btn btn-info', 'target' => '_blank', 'title' => 'Danh sách Cuộc gọi' ]);
}

$templateStatus = '
    {label}
    <div class="input-group">
        {input}
        <button type="button" class="btn btn-success create-appointment-schedule" title="Tạo lịch hẹn" style="display: none">
            <i class="icon dripicons-to-do"></i>
        </button>' . $btnListAS . '
        <button type="button" class="btn btn-success create-call" title="Tạo cuộc gọi"  style="display: none">
            <i class="icon dripicons-phone"></i>
        </button>
        ' . $btnListCall . '
    </div>
    {error}{hint}';
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
    <div class="customer-form">
        <?php $form = ActiveForm::begin(['id' => 'iway-customer']); ?>

        <?= $form->field($model, 'none_db_ac_is_create')->input('hidden')->label(false) ?>
        <?= $form->field($model, 'none_db_call_is_create')->input('hidden')->label(false) ?>

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
                <div class="col-3">
                    <?= $form->field($model, 'fb_fanpage')->dropDownList($model->getDropdown('fb_fanpage'), [
                        'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                    ]) ?>
                </div>
                <div class="col-3">
                    <?= $form->field($model, 'fb_customer')->textInput(['maxlength' => true]) ?>
                </div>
                <!--<div class="col-6">
                    <? /*= $form->field($model, 'avatar')->textInput(['maxlength' => true]) */ ?>
                </div>-->
                <div class="col-12">
                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                </div>
            </div>
        </section>

        <section class="hk-sec-wrapper mt-4">
            <h5 class="hk-sec-title"><?= Yii::t('backend', 'Thông tin quản lý') ?></h5>
            <div class="row">
                <div class="col-3">
                    <?php
                    if ($model->primaryKey === null && $user->getRoleName($user->id) === Yii::$app->getModule('iway')->params['role_online_sales']) {
                        $model->online_sales_id = Yii::$app->user->id;
                    }
                    ?>
                    <?= $form->field($model, 'online_sales_id')->widget(Select2::class, [
                        'data' => ArrayHelper::map(User::getUserByRole(Yii::$app->getModule('iway')->params['role_online_sales'], [User::tableName() . '.id', UserProfile::tableName() . '.fullname']), 'id', 'fullname'),
                        'options' => ['placeholder' => Yii::t('backend', 'Chọn một giá trị ...')],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]); ?>
                </div>
                <div class="col-3">
                    <?= $form->field($model, 'status_customer', [ 'template' => $templateStatus ])->dropDownList($model->getDropdown('status_customer'), [
                        'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                    ]) ?>
                </div>
                <div class="col-3">
                    <?= $form->field($model, 'reason_fail')->dropDownList($model->getDropdown('reason_fail'), [
                        'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                    ]) ?>
                </div>
                <div class="col-12 mb-4">
                    <section class="hk-sec-wrapper w-50" id="appointment-schedule-sec" style="display: none">
                        <h5 class="hk-sec-title">Thông tin lịch hẹn</h5>
                        <div class="row">
                            <div class="col-6">
                                <?= $form->field($model, 'none_db_ac_title')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-6">
                                <?= $form->field($model, 'co_so_id')->dropDownList(ArrayHelper::map(CoSoTable::getAll(), 'id', 'title'), [
                                    'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                                ]) ?>
                            </div>
                            <div class="col-6">
                                <?= $form->field($model, 'none_db_ac_start_time')->widget(DateTimePicker::class, [
                                    'template' => '{input}{button}',
                                    'pickButtonIcon' => 'btn btn-increment btn-light',
                                    'pickIconContent' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-th']),
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd-mm-yyyy hh:ii',
                                        'todayHighLight' => true,
                                    ]
                                ]) ?>
                            </div>
                            <div class="col-12">
                                <?= $form->field($model, 'none_db_ac_note')->widget(\modava\tiny\TinyMce::class, [
                                    'options' => ['rows' => 12],
                                    'type' => 'content'
                                ]) ?>
                            </div>
                        </div>
                    </section>
                    <section class="hk-sec-wrapper w-50" id="call-sec" style="display: none">
                        <h5 class="hk-sec-title">Thông tin cuộc gọi</h5>
                        <div class="row">
                            <div class="col-6">
                                <?= $form->field($model, 'none_db_call_title')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-6">
                                <?= $form->field($model, 'none_db_call_start_time')->widget(DateTimePicker::class, [
                                    'template' => '{input}{button}',
                                    'pickButtonIcon' => 'btn btn-increment btn-light',
                                    'pickIconContent' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-th']),
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd-mm-yyyy hh:ii',
                                        'todayHighLight' => true,
                                    ]
                                ]) ?>
                            </div>
                            <div class="col-12">
                                <?= $form->field($model, 'none_db_call_note')->widget(\modava\tiny\TinyMce::class, [
                                    'options' => ['rows' => 12],
                                    'type' => 'content'
                                ]) ?>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-12">
                    <?= $form->field($model, 'online_sales_note')->widget(\modava\tiny\TinyMce::class, [
                        'options' => ['rows' => 12],
                        'type' => 'content'
                    ]) ?>
                </div>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </section>

        <?php ActiveForm::end(); ?>
    </div>

<?php
$this->registerJsFile(Yii::$app->assetManager->publish('@modava/iway/web/js/customer/edit.js')[1], ['position' => \yii\web\View::POS_END]);