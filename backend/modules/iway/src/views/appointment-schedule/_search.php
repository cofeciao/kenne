<?php

use kartik\daterange\DateRangePicker;
use kartik\select2\Select2;
use modava\auth\models\User;
use modava\auth\models\UserProfile;
use modava\iway\models\CoSo;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\search\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */

$templateInput = [
    'template' => '{label}<div class="input-group">{input}<button type="button" class="btn btn-light clear-value"><span class="fa fa-times"></span></button></div>{error}{hint}'
];
$dateTemplateInput = [
    'template' => '{label}<div class="input-group">
                            <div class="input-group" style="width: calc(100% - 41px);">{input}
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-light clear-value"><span class="fa fa-times"></span></button>
                        </div>{error}{hint}'
];
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'id' => 'customer-search',
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <section class="hk-sec-wrapper p-1">
        <div class="row collapse show save-state-search" data-search-panel="iway-appointment-schedule-search-panel" id="search-panel">
            <div class="col-md-3 col-sm-4 col-lg-3">
                <?= $form->field($model, 'title', $templateInput)->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3 col-sm-4 col-lg-3">
                <?= $form->field($model, 'customer_id')->widget(Select2::class, [
                    'value' => $model->customer_id,
                    'initValueText' => $model->customer_id ? $model->customer->fullname . ' - ' . $model->customer->phone : '',
                    'options' => ['placeholder' => Yii::t('backend', 'Chọn một giá trị ...')],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => Url::toRoute(['/iway/customer/get-customer-by-key-word']),
                            'dataType' => 'json',
                            'delay' => 250,
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(model) { return model.text; }'),
                        'templateSelection' => new JsExpression('function (model) { return model.text; }'),
                    ],
                ]); ?>
            </div>
            <div class="col-md-3 col-sm-4 col-lg-3">
                <?= $form->field($model, 'status', $templateInput)->dropDownList($model->getDropdown('status'), [
                    'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                ]) ?>
            </div>
            <div class="col-md-3 col-sm-4 col-lg-3">
                <?= $form->field($model, 'created_at', $dateTemplateInput)->widget(DateRangePicker::class, [
                    'convertFormat' => true,
                    'useWithAddon' => true,
                    'readonly' => true,
                    'options' => [
                        'class' => 'data-krajee-daterangepicker form-control',
                    ],
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'd-m-Y',
                            'cancelLabel' => 'Clear',
                        ],
                        'autoApply' => true,
                        'showDropdowns' => true,
                    ],
                    'pluginEvents' => [
                        "cancel.daterangepicker" => "function() { $(this).find('input').val('').trigger('change'); }",
                    ]
                ]); ?>
            </div>
            <div class="col-md-3 col-sm-4 col-lg-3">
                <?= $form->field($model, 'start_time', $dateTemplateInput)->widget(DateRangePicker::class, [
                    'convertFormat' => true,
                    'useWithAddon' => true,
                    'readonly' => true,
                    'options' => [
                        'class' => 'data-krajee-daterangepicker form-control',
                    ],
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'd-m-Y',
                            'cancelLabel' => 'Clear',
                        ],
                        'autoApply' => true,
                        'showDropdowns' => true,
                    ],
                    'pluginEvents' => [
                        "cancel.daterangepicker" => "function() { $(this).find('input').val('').trigger('change'); }",
                    ]
                ]); ?>
            </div>
            <div class="col-md-3 col-sm-4 col-lg-3">
                <?php
                $users = UserProfile::find()->all();
                $listUser = ArrayHelper::map($users, 'user_id', 'fullname');
                ?>
                <?= $form->field($model, 'created_by')->widget(Select2::class, [
                    'data' => $listUser,
                    'options' => ['placeholder' => Yii::t('backend', 'Chọn một giá trị ...')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]) ?>
            </div>
            <div class="col-md-3 col-sm-4 col-lg-3">
                <?= $form->field($model, 'co_so_id', $templateInput)->dropDownList(ArrayHelper::map(CoSo::getAll(), 'id', 'title'), [
                    'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                ]) ?>
            </div>
            <div class="col-md-3 col-sm-4 col-lg-3">
                <?= $form->field($model, 'direct_sales_id')->widget(Select2::class, [
                    'data' => ArrayHelper::map(User::getUserByRole(Yii::$app->getModule('iway')->params['role_direct_sales'], [User::tableName() . '.id', UserProfile::tableName() . '.fullname']), 'id', 'fullname'),
                    'options' => ['placeholder' => Yii::t('backend', 'Chọn một giá trị ...')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]) ?>
            </div>
            <div class="col-md-3 col-sm-4 col-lg-3">
                <?= $form->field($model, 'doctor_thamkham_id')->widget(Select2::class, [
                    'data' => ArrayHelper::map(User::getUserByRole(Yii::$app->getModule('iway')->params['role_doctor_thamkham'], [User::tableName() . '.id', UserProfile::tableName() . '.fullname']), 'id', 'fullname'),
                    'options' => ['placeholder' => Yii::t('backend', 'Chọn một giá trị ...')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary btn-sm']) ?>
                <button class="btn btn-primary btn-sm btn-hide-search" data-toggle="collapse" data-target="#search-panel"
                        aria-expanded="false" aria-controls="search-panel" type="button"><?= Yii::t('backend',
                        'Ẩn tìm kiếm') ?></button>
                <?= Html::a('Ngày hẹn hôm nay', \yii\helpers\Url::toRoute(['index', 'AppointmentScheduleSearch[start_time]' => date('d-m-Y') . ' - ' . date('d-m-Y')]), ['class' => 'btn btn-info btn-sm']) ?>
            </div>
        </div>
    </section>

    <?php ActiveForm::end(); ?>

</div>
