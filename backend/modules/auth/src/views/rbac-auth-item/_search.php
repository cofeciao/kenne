<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
<<<<<<< HEAD
=======
use modava\auth\AuthModule;
>>>>>>> master

/* @var $this yii\web\View */
/* @var $model modava\auth\models\search\RbacAuthItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rbac-auth-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'rule_name') ?>

    <?= $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
<<<<<<< HEAD
        <?= Html::submitButton(Yii::t('auth', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('auth', 'Reset'), ['class' => 'btn btn-default']) ?>
=======
        <?= Html::submitButton(AuthModule::t('auth', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(AuthModule::t('auth', 'Reset'), ['class' => 'btn btn-default']) ?>
>>>>>>> master
    </div>

    <?php ActiveForm::end(); ?>

</div>
