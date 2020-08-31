<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\search\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'ordered_at') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'co_so') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(IwayModule::t('iway','Search.'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(IwayModule::t('iway','Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
