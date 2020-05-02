<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\article\models\ArticleCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-category-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-actions">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'parent_id')->textInput() ?>

        <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->widget(\dosamigos\tinymce\TinyMce::class, [
            'options' => ['rows' => 6],
            'language' => 'vi',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);?>

        <?= $form->field($model, 'position')->textInput() ?>

        <?= $form->field($model, 'ads_pixel')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'ads_session')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'status')->textInput() ?>

        <?= $form->field($model, 'created_at')->textInput() ?>

        <?= $form->field($model, 'updated_at')->textInput() ?>

        <?= $form->field($model, 'created_by')->textInput() ?>

        <?= $form->field($model, 'updated_by')->textInput() ?>

        <?php if (Yii::$app->controller->action->id == 'create')
            $model->status = 1;
        ?>
        <?= $form->field($model, 'status')->checkbox() ?>
    </div>
    <div class="form-actions">
        <?= Html::resetButton('<i class="ft-x"></i> Cancel', ['class' =>
            'btn btn-warning mr-1']) ?>
        <?= Html::submitButton('<i class="fa fa-check-square-o"></i> Save' ,
            ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>