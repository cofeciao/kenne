<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\kenne\KenneModule;

/* @var $this yii\web\View */
/* @var $model modava\kenne\models\Slides */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="slides-form">
    <?php $form = ActiveForm::begin(
        ['options' => ['enctype' => 'multipart/form-data']]
    ); ?>
    <?= $form->field($model, 'sld_title')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-6">
    <?= $form->field($model, 'sld_cat_id')->dropDownList(\yii\helpers\ArrayHelper::map($model->getCategory(), 'id', 'cat_name'), ['prompt' => 'Chọn loại sản phẩm'])->label('Loại sản phẩm') ?>
        </div>

        <div class="col-6">
    <?= $form->field($model, 'sld_type')->dropDownList(
        [
            '1'=>'Slide',
            '0'=>'Banner Nhỏ',
            '2'=>'Banner Lớn'
        ],
        ['prompt' => 'Chọn loại ảnh']
    ); ?>
        </div>
    </div>
    <?= $form->field($model, 'sld_description')->widget(\modava\tiny\TinyMce::class, [
        'options' => ['rows' => 6],
    ]) ?>



    <?php
    if (empty($model->getErrors()))
        $path = Yii::$app->params['kenne']['150x150']['folder'];
    else
        $path = null;
    echo \modava\tiny\FileManager::widget([
        'model' => $model,
        'attribute' => 'sld_image',
        'path' => $path,
    ]); ?>

    <?= $form->field($model, 'sld_status')->checkbox(['checked' => 'checked']); ?>

    <div class="form-group">
        <?= Html::submitButton(KenneModule::t('kenne', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
