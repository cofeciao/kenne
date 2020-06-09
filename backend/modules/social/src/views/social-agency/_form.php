<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\social\SocialModule;

/* @var $this yii\web\View */
/* @var $model modava\social\models\SocialAgency */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="social-agency-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(\modava\tiny\TinyMce::class, [
        'options' => ['rows' => 6],
    ]) ?>

    <?= $form->field($model, 'language')->dropDownList(['vi' => 'Vi', 'en' => 'En', 'jp' => 'Jp',], []) ?>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(SocialModule::t('social', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
