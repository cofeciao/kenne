<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\categories\CategoriesModule;

/* @var $this yii\web\View */
/* @var $model modava\categories\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="categories-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'cat_name')->textInput(['maxlength' => true]) ?>

        <?php if (Yii::$app->controller->action->id == 'create')
            $model->cat_status = 1;
        ?>

		<?= $form->field($model, 'cat_status')->checkbox(['label'=> 'Trạng thái']) ?>

        <div class="form-group">
            <?= Html::submitButton(CategoriesModule::t('categories', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
