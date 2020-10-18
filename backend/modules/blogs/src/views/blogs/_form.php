<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\blogs\BlogsModule;

/* @var $this yii\web\View */
/* @var $model modava\blogs\models\Blogs */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="blogs-form">
    <?php $form = ActiveForm::begin(); ?>



        <div class="form-group">
            <?= Html::submitButton(BlogsModule::t('blogs', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
