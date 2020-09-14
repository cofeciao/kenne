<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\search\DropdownsConfigSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dropdowns-config-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'field_name') ?>

    <?= $form->field($model, 'dropdown_value') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend','Search.'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend','Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
