<?php

use modava\iway\models\table\OriginTable;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\iway\IwayModule;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Fanpage */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="fanpage-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="hk-sec-wrapper">
        <div class="hk-sec-title">
            <h5>Thông tin chung</h5>
        </div>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'origin_id')->widget(\kartik\select2\Select2::class, [
                    'options' => ['placeholder' => 'Chọn một giá trị ...'],
                    'data' => ArrayHelper::map(OriginTable::getAllOrigin(Yii::$app->language), 'id', 'name'),
                    'value' => $model->origin_id
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'url_page')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
                <?= $form->field($model, 'status')->checkbox() ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'language')->dropDownList(['vi' => 'Vi', 'en' => 'En', 'jp' => 'Jp',], ['prompt' => '']) ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'description')->widget(\modava\tiny\TinyMce::class, [
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
