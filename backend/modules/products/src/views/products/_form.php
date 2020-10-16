<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\products\ProductsModule;

/* @var $this yii\web\View */
/* @var $model modava\products\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="products-form">
    <?php
    
    ?>
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
		<?= $form->field($model, 'pro_name')->label('Tên sp')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'cat_id')->dropDownList(\yii\helpers\ArrayHelper::map($model->getCategory(),'id','cat_name'),['prompt'=>'Chọn loại sản phẩm'])->label('Loại sản phẩm') ?>

        <?= $form->field($model, 'pro_description')->label('Mô tả')->widget(\modava\tiny\TinyMce::class, [
            'options' => ['rows' => 6],
        ]) ?>
        
		<?= $form->field($model, 'pro_quantity')->label('Số lượng')->textInput() ?>

		<?= $form->field($model, 'pro_price')->label('Giá')->textInput() ?>

        <?php /*  \modava\tiny\FileManager::widget([
            'model' => $model,
            'attribute' => 'pro_image',
            'label' => ProductsModule::t('products', 'Hình ảnh ') . ': ' . Yii::$app->params['product-size'],
            ]);
        */ ?>
    <?= $form->field($model, 'file')->fileInput() ?>

        <?php if (Yii::$app->controller->action->id == 'create')
            $model->pro_status = 1;
        ?>

		<?= $form->field($model, 'pro_status')->checkbox(['label' => 'Trạng thái']) ?>

		<?= $form->field($model, 'pro_sale')->label('Khuyến mãi %')->input('number') ?>


        <div class="form-group">
            <?= Html::submitButton(ProductsModule::t('products', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
