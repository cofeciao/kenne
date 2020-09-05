<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\marketing\MarketingModule;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model modava\marketing\models\MarketingFacebookAds */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="marketing-facebook-ads-form">
    <?php $form = ActiveForm::begin([
        'id' => 'mkt-fb-ads',
        'options' => [
            'class' => 'mkt-fb-ads-form'
        ],
        'enableAjaxValidation' => true,
        'validationUrl' => \yii\helpers\Url::toRoute(['validate-mkt-fb-ads', 'id' => $model->primaryKey])
    ]); ?>
    <?= $form->field($model, 'so_tien_chay')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hien_thi')->textInput() ?>

    <?= $form->field($model, 'tiep_can')->textInput() ?>

    <?= $form->field($model, 'binh_luan')->textInput() ?>

    <?= $form->field($model, 'tin_nhan')->textInput() ?>

    <?= $form->field($model, 'page_chay')->textInput() ?>

    <?= $form->field($model, 'location_id')->textInput() ?>

    <?= $form->field($model, 'ngay_chay')->widget(DatePicker::class, [
        'template' => '{input}<span class="input-group-addon1 clear-value"><span class="fa fa-times"></span></span>{addon}',
        'clientOptions' => [
            'format' => 'dd-mm-yyyy',
            'autoclose' => true,
        ],
        'clientEvents' => [],
        'options' => [
            'readonly' => 'readonly',
            'class' => 'form-control'
        ]
    ]) ?>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
