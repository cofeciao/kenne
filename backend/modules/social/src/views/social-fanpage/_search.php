<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\social\models\search\SocialFanpageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="social-fanpage-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'origin_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'slug') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'url_page') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('social', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('social', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
