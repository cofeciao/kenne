<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\search\CustomerDropdownsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-dropdowns-search">

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
        <?= Html::submitButton(IwayModule::t('iway','Search.'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(IwayModule::t('iway','Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
