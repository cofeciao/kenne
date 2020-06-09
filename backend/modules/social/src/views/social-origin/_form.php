<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\widgets\ToastrWidget;
use modava\social\SocialModule;
use modava\social\models\table\SocialAgencyTable;

if($model->agencyHasMany != null){
    $model->agencies = ArrayHelper::map($model->agencyHasMany, 'id', 'id');
}

/* @var $this yii\web\View */
/* @var $model modava\social\models\SocialOrigin */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="social-origin-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= Select2::widget([
        'model' => $model,
        'attribute' => 'agencies',
        'data' => ArrayHelper::map(SocialAgencyTable::getAllAgency(Yii::$app->language), 'id', 'name'),
        'options' => [
            'class' => 'select2-multiple',
            'multiple' => 'multiple'
        ],
    ]) ?>

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
