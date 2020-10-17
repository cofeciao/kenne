<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\search\IwayTraySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="iway-tray-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'note') ?>

    <?= $form->field($model, 'date_delivery') ?>

    <?php // echo $form->field($model, 'user_delivery') ?>

    <?php // echo $form->field($model, 'treatment_schedule_id') ?>

    <?php // echo $form->field($model, 'espect_date_begin') ?>

    <?php // echo $form->field($model, 'espect_date_end') ?>

    <?php // echo $form->field($model, 'date_begin') ?>

    <?php // echo $form->field($model, 'date_end') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend','Search.'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend','Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
