<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\kenne\KenneModule;

/* @var $this yii\web\View */
/* @var $model modava\kenne\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="products-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    <?= $form->field($model, 'pro_name')->label('Tên sp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_id')->dropDownList(\yii\helpers\ArrayHelper::map($model->getCategory(),'id','cat_name'),['prompt'=>'Chọn loại sản phẩm'])->label('Loại sản phẩm') ?>

    <?= $form->field($model, 'pro_description')->label('Mô tả')->widget(\modava\tiny\TinyMce::class, [
        'options' => ['rows' => 6],
    ]) ?>

    <?= $form->field($model, 'pro_quantity')->label('Số lượng')->textInput() ?>

    <?= $form->field($model, 'pro_price')->label('Giá')->textInput() ?>

    <?php
    if (empty($model->getErrors()))
        $path = Yii::$app->params['kenne']['150x150']['folder'];
    else
        $path = null;
    echo \modava\tiny\FileManager::widget([
        'model' => $model,
        'attribute' => 'pro_image',
        'path' => $path,
        'label' => KenneModule::t('kenne', 'Hình ảnh') . ': ',
    ]); ?>

    <?php if (Yii::$app->controller->action->id == 'create')
        $model->pro_status = 1;
    ?>

    <?= $form->field($model, 'pro_status')->checkbox(['label' => 'Trạng thái']) ?>

    <?= $form->field($model, 'pro_sale')->label('Khuyến mãi %')->input('number') ?>


    <div class="form-group">
        <?= Html::submitButton(KenneModule::t('products', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

