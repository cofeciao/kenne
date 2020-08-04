<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\kenne\KenneModule;

/* @var $this yii\web\View */
/* @var $model modava\kenne\models\Blogs */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="blogs-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<!--            < ?= $form->field($model, 'file[]')->fileInput(['multiple'=>'multiple']) ?>-->

            <?php
            if (empty($model->getErrors()))
                $path = Yii::$app->params['kenne']['150x150']['folder'];
            else
                $path = null;
            echo \modava\tiny\FileManager::widget([
                'model' => $model,
                'attribute' => 'image',
                'path' => $path,
                'label' => KenneModule::t('kenne', 'Hình ảnh') . ': ',
            ]); ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'descriptions')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->dropDownList(
                [
                    0 => 'Không hoạt động',
                    1 => 'Hoạt Động'
                ],
                [
                    'prompt' => 'Status'
                ]
            ) ?>

            <?= $form->field($model, 'comments')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'search')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'recent_post')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tags')->dropDownList(
                [
                    'Shirt' => 'Shirt',
                    'Hoodie' => 'Hoodie',
                    'Jacket' => 'Jacket',
                    'Scarf' => 'Scarf',
                    'Frocks' => 'Frocks'
                ],
                [
                    'prompt' => 'Chọn Loại'
                ]
            ) ?>
        <div class="form-group">
            <?= Html::submitButton(KenneModule::t('kenne', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
