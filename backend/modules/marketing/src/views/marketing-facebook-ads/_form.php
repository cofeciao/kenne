<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\marketing\MarketingModule;

/* @var $this yii\web\View */
/* @var $model modava\marketing\models\MarketingFacebookAds */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="marketing-facebook-ads-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'so_tien_chay')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hien_thi')->textInput() ?>

    <?= $form->field($model, 'tiep_can')->textInput() ?>

    <?= $form->field($model, 'binh_luan')->textInput() ?>

    <?= $form->field($model, 'tin_nhan')->textInput() ?>

    <?= $form->field($model, 'page_chay')->textInput() ?>

    <?= $form->field($model, 'location_id')->textInput() ?>

    <?= $form->field($model, 'ngay_chay')->textInput() ?>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(MarketingModule::t('marketing', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
