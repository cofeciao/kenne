<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
<<<<<<< HEAD
=======
use modava\pages\PagesModule;
>>>>>>> master

/* @var $this yii\web\View */
/* @var $model modava\pages\models\search\DocumentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'slug') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
<<<<<<< HEAD
        <?= Html::submitButton(Yii::t('pages', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('pages', 'Reset'), ['class' => 'btn btn-default']) ?>
=======
        <?= Html::submitButton(PagesModule::t('pages', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(PagesModule::t('pages', 'Reset'), ['class' => 'btn btn-default']) ?>
>>>>>>> master
    </div>

    <?php ActiveForm::end(); ?>

</div>
