<?php

use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\search\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'fullname') ?>

    <?= $form->field($model, 'avatar') ?>

    <?= $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'province_id') ?>

    <?php // echo $form->field($model, 'district_id') ?>

    <?php // echo $form->field($model, 'ward_id') ?>

    <?php // echo $form->field($model, 'online_source') ?>

    <?php // echo $form->field($model, 'fb_fanpage') ?>

    <?php // echo $form->field($model, 'fb_customer') ?>

    <?php // echo $form->field($model, 'online_sales_id') ?>

    <?php // echo $form->field($model, 'online_sales_note') ?>

    <?php // echo $form->field($model, 'direct_sales_id') ?>

    <?php // echo $form->field($model, 'direct_sales_note') ?>

    <?php // echo $form->field($model, 'status_customer') ?>

    <?php // echo $form->field($model, 'co_so_id') ?>

    <?php // echo $form->field($model, 'reason_fail') ?>

    <?php // echo $form->field($model, 'who_created') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend','Search.'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend','Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
