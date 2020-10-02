<?php

use backend\widgets\ToastrWidget;
use common\models\User;
use common\models\UserProfile;
use kartik\select2\Select2;
use modava\datetime\DateTimePicker;
use modava\iway\models\AppointmentSchedule;
use modava\iway\models\table\CoSoTable;
use modava\iway\widgets\JsCreateModalWidget;
use modava\tiny\TinyMce;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\AppointmentSchedule */
/* @var $form yii\widgets\ActiveForm */

$model->start_time = $model->start_time != null
    ? date('d-m-Y H:i', strtotime($model->start_time))
    : '';
$model->check_in_time = $model->check_in_time != null
    ? date('d-m-Y H:i', strtotime($model->check_in_time))
    : '';

$user = User::findOne(Yii::$app->user->id);
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="appointment-schedule-form">
    <?php $form = ActiveForm::begin(['id' => 'lich_hen_form']); ?>

    <section class="hk-sec-wrapper mb-4">
        <h5 class="hk-sec-title">Thông tin chung</h5>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'customer_id')->widget(Select2::class, [
                    'value' => $model->customer_id,
                    'initValueText' => $model->customer_id ? $model->customer->fullname : '',
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
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(model) { return model.text; }'),
                        'templateSelection' => new JsExpression('function (model) { return model.text; }'),
                    ],
                ]); ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'co_so_id')->dropDownList(ArrayHelper::map(CoSoTable::getAll(), 'id', 'title'), [
                    'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'start_time')->widget(DateTimePicker::class, [
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
            <div class="col-6">
                <?= $form->field($model, 'status')->dropDownList($model->getDropdown('status'), [
                    'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'status_service')->dropDownList($model->getDropdown('status_service'), [
                    'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'reason_fail')->dropDownList($model->getDropdown('reason_fail'), [
                    'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                ]) ?>
                <?= $form->field($model, 'accept_for_service')->dropDownList($model->getDropdown('accept_for_service'), [
                    'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'check_in_time')->widget(DateTimePicker::class, [
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
                <?= $form->field($model, 'description')->widget(TinyMce::class, [
                    'options' => ['rows' => 12],
                    'type' => 'content'
                ]) ?>
            </div>

        </div>
    </section>

    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Thông tin thêm</h5>
        <div class="row">
            <?php if (in_array($user->getRoleName($user->id), ['le_tan', 'direct_sales']) || Yii::$app->user->can(User::DEV) || Yii::$app->user->can('admin')): ?>
                <div class="col-6">
                    <?php
                    if ($model->primaryKey === null && $user->getRoleName($user->id) === 'direct_sales') {
                        $model->direct_sales_id = Yii::$app->user->id;
                    }
                    $directSales = User::getUserByRole('direct_sales', [User::tableName() . '.id', UserProfile::tableName() . '.fullname']);
                    ?>
                    <?= $form->field($model, 'direct_sales_id')->widget(Select2::class, [
                        'data' => ArrayHelper::map($directSales, 'id', 'fullname'),
                        'options' => ['placeholder' => Yii::t('backend', 'Chọn một giá trị ...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>
                </div>
            <?php endif; ?>
            <?php if ($user->getRoleName($user->id) === 'direct_sales' || Yii::$app->user->can(User::DEV) || Yii::$app->user->can('admin')): ?>
                <div class="col-12">
                    <?= $form->field($model, 'direct_sales_note')->widget(TinyMce::class, [
                        'options' => ['rows' => 12],
                        'type' => 'content'
                    ]) ?>
                </div>
            <?php endif; ?>
            <?php if (in_array($user->getRoleName($user->id), ['le_tan', 'doctor_thamkham']) || Yii::$app->user->can(User::DEV) || Yii::$app->user->can('admin')): ?>
                <div class="col-6">
                    <?php
                    if ($model->primaryKey === null && $user->getRoleName($user->id) === 'doctor_thamkham') {
                        $model->doctor_thamkham_id = Yii::$app->user->id;
                    }
                    ?>
                    <?= $form->field($model, 'doctor_thamkham_id')->widget(Select2::class, [
                        'data' => ArrayHelper::map(User::getUserByRole('doctor_thamkham', [User::tableName() . '.id', UserProfile::tableName() . '.fullname']), 'id', 'fullname'),
                        'options' => ['placeholder' => Yii::t('backend', 'Chọn một giá trị ...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>
                </div>
            <?php endif; ?>
            <?php if ($user->getRoleName($user->id) === 'doctor_thamkham' || Yii::$app->user->can(User::DEV) || Yii::$app->user->can('admin')): ?>
                <div class="col-12">
                    <?= $form->field($model, 'doctor_thamkham_note')->widget(TinyMce::class, [
                        'options' => ['rows' => 12],
                        'type' => 'content'
                    ]) ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </section>
</div>

<?php ActiveForm::end(); ?>

<?= JsCreateModalWidget::widget(['formClassName' => 'lich_hen_form', 'modelName' => 'AppointmentSchedule']) ?>

<?php

$statusDen = AppointmentSchedule::STATUS_DEN;
$serviceStatusDenKhongDongY = AppointmentSchedule::SERVICE_STATUS_KHONG_DONG_Y_LAM;
$serviceStatusDenDongY = AppointmentSchedule::SERVICE_STATUS_DONG_Y_LAM;

$script = <<<JS
function handleReasonFail() {
    let reasonFail = $('#appointmentschedule-reason_fail'),
        acceptForService = $('#appointmentschedule-accept_for_service'),
        statusService = $('#appointmentschedule-status_service');
    
    if (statusService.val() === '$serviceStatusDenKhongDongY') {
        reasonFail.closest('.form-group').show(300);
        acceptForService.val('').trigger('change').closest('.form-group').hide(300);
    } else if (statusService.val() === '$serviceStatusDenDongY') {
        acceptForService.closest('.form-group').show(300);
        reasonFail.val('').trigger('change').closest('.form-group').hide(300);
    } else {
        reasonFail.val('').trigger('change').closest('.form-group').hide(300);
        acceptForService.val('').trigger('change').closest('.form-group').hide(300);
    }
}
function handleServiceStatus() {
    let serviceStatus = $('#appointmentschedule-status_service'),
        checkinTime = $('#appointmentschedule-check_in_time');
    
  if ($('#appointmentschedule-status').val() !== '$statusDen') {
      serviceStatus.val('').trigger('change').closest('.form-group').hide(300);
      checkinTime.val('').trigger('change').closest('.form-group').hide(300);
  } else {
      serviceStatus.closest('.form-group').show(300);
      checkinTime.closest('.form-group').show(300);
  }
}

handleReasonFail();
$('#appointmentschedule-status_service').on('change', function() {
    handleReasonFail();
})
handleServiceStatus();
$('#appointmentschedule-status').on('change', function() {
    handleServiceStatus();
})
JS;

$this->registerJs($script, View::POS_END);
?>
