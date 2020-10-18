<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\test\models\search\LocationCountrySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-country-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'CountryCode') ?>

    <?= $form->field($model, 'CommonName') ?>

    <?= $form->field($model, 'slug') ?>

    <?= $form->field($model, 'FormalName') ?>

    <?php // echo $form->field($model, 'CountryType') ?>

    <?php // echo $form->field($model, 'CountrySubType') ?>

    <?php // echo $form->field($model, 'Sovereignty') ?>

    <?php // echo $form->field($model, 'Capital') ?>

    <?php // echo $form->field($model, 'CurrencyCode') ?>

    <?php // echo $form->field($model, 'CurrencyName') ?>

    <?php // echo $form->field($model, 'TelephoneCode') ?>

    <?php // echo $form->field($model, 'CountryCode3') ?>

    <?php // echo $form->field($model, 'CountryNumber') ?>

    <?php // echo $form->field($model, 'InternetCountryCode') ?>

    <?php // echo $form->field($model, 'SortOrder') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'Flags') ?>

    <?php // echo $form->field($model, 'IsDeleted') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('test', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('test', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
