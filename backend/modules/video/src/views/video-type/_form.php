<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\video\VideoModule;

/* @var $this yii\web\View */
/* @var $model modava\video\models\VideoType */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="video-type-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'language')->dropDownList(Yii::$app->params['availableLocales'], ['prompt' => Yii::t('backend', 'Chọn ngôn ngữ...')]) ?>
        </div>
    </div>

    <?= $form->field($model, 'description')->widget(\modava\tiny\TinyMce::class, []) ?>


    <?php
    if (empty($model->getErrors()))
        $path = Yii::$app->params['video-type']['150x150']['folder'];
    else
        $path = null;

    echo \modava\tiny\FileManager::widget([
        'model' => $model,
        'attribute' => 'image',
        'path' => $path,
        'label' => Yii::t('backend', 'Hình ảnh') . ': ' . Yii::$app->params['video-type-size'],
    ]); ?>


    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
