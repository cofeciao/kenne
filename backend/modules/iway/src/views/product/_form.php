<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\iway\IwayModule;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="product-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Thông tin chung</h5>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'category')->dropDownList($model->getDropdown('category'),
                    [
                        'prompt' => IwayModule::t('iway', 'Chọn một giá trị...'),
                    ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'price')->textInput() ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'language')->dropDownList(['vi' => 'Vi', 'en' => 'En', 'jp' => 'Jp',], ['prompt' => '']) ?>
            </div>
            <div class="col-6">
                <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
                <?= $form->field($model, 'status')->checkbox() ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'description')->widget(\modava\tiny\TinyMce::class, [
                    'options' => ['rows' => 6],
                    'type' => 'content'
                ]) ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton(IwayModule::t('iway', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
