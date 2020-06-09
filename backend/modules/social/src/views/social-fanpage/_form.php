<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Select2;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\social\SocialModule;
use yii\helpers\ArrayHelper;
use modava\social\models\table\SocialOriginTable;
use modava\tiny\TinyMce;

/* @var $this yii\web\View */
/* @var $model modava\social\models\SocialFanpage */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="social-fanpage-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= Select2::widget([
        'model' => $model,
        'attribute' => 'origin_id',
        'data' => ArrayHelper::map(SocialOriginTable::getAllOrigin(Yii::$app->language), 'id', 'name'),
        'options' => [
            'prompt' => SocialModule::t('social', 'Chọn nguồn trực tuyến...')
        ]
    ]) ?>

    <?= $form->field($model, 'description')->widget(TinyMce::class, [
        'options' => ['rows' => 6]
    ]) ?>

    <?= $form->field($model, 'url_page')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'language')->dropDownList(['vi' => 'Vi', 'en' => 'En', 'jp' => 'Jp',], []) ?>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(SocialModule::t('social', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
