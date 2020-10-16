<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\pages\PagesModule;

/* @var $this yii\web\View */
/* @var $model modava\pages\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="document-form">
    <?php $form = ActiveForm::begin(); ?>
<<<<<<< HEAD
		<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'file')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'status')->textInput() ?>

		<?= $form->field($model, 'language')->dropDownList([ '' => '', 'vi' => 'Vi', 'en' => 'En', 'jp' => 'Jp', ], ['prompt' => '']) ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

		<?= $form->field($model, 'updated_at')->textInput() ?>

		<?= $form->field($model, 'created_by')->textInput() ?>

		<?= $form->field($model, 'updated_by')->textInput() ?>

		<?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
		<?= $form->field($model, 'status')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton(PagesModule::t('pages', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
=======

    <div class="row">
        <div class="col-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'language')->dropDownList(Yii::$app->params['availableLocales'], ['prompt' => 'Chọn ngôn ngữ...']) ?>
        </div>

    </div>

    <?= $form->field($model, 'description')->widget(\modava\tiny\TinyMce::class, [
        'options' => ['rows' => 6],
    ]); ?>

    <div class="row">
        <div class="col-6">
            <?php
            if (empty($model->getErrors()))
                $path = Yii::$app->params['document']['60x64']['folder'];
            else
                $path = null;

            echo \modava\tiny\FileManager::widget([
                'model' => $model,
                'attribute' => 'image',
                'path' => $path,
                'label' => Yii::t('backend', 'Hình ảnh') . ': ',
            ]); ?>
        </div>
        <div class="col-6">
            <?php
                echo $form->field($model, 'file')->fileInput();
                if($model->file != null)
                    echo Html::a(Yii::t('backend', 'File đã upload'), \yii\helpers\Url::toRoute(['download-file', 'file' => $model->file]), ['target' => '_blank', 'data-pjax' => 0]);
            ?>
        </div>
    </div>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
>>>>>>> master

    <?php ActiveForm::end(); ?>
</div>
