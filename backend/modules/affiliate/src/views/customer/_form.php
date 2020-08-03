<?php

use modava\affiliate\widgets\JsCreateModalWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\affiliate\AffiliateModule;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model modava\affiliate\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="customer-form">
    <?php $form = ActiveForm::begin([
        'id' => 'customer_form',
        'enableAjaxValidation' => true,
        'validationUrl' => Url::toRoute(['/affiliate/customer/validate', 'id' => $model->primaryKey]),
    ]); ?>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'face_customer')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'sex')->dropDownList(Yii::$app->controller->module->params['sex'], [
                    'prompt' => AffiliateModule::t('affiliate', 'Select an option ...'),
                    'id' => 'sex'
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
                ])  ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'partner_customer_id')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'partner_id')->dropDownList(
                    ArrayHelper::map(\modava\affiliate\models\table\PartnerTable::getAllRecords(), 'id', 'title'),
                    [ 'prompt' => AffiliateModule::t('affiliate', 'Select an option ...'),
                        'id' => 'partner-id'
                    ]
                ) ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'description')->widget(\modava\tiny\TinyMce::class, [
                    'options' => ['rows' => 6],
                ]) ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton(AffiliateModule::t('affiliate', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>

<?= JsCreateModalWidget::widget(['formClassName' => 'customer_form', 'modelName' => 'Customer']) ?>