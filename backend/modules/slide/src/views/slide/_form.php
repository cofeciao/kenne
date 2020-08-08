<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\slide\SlideModule;
use yii\helpers\ArrayHelper;
use modava\slide\models\table\SlideCategoryTable;
use modava\slide\models\table\SlideTypeTable;

/* @var $this yii\web\View */
/* @var $model modava\slide\models\Slide */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="slide-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'language')
                ->dropDownList(Yii::$app->getModule('product')->params['availableLocales'], ['prompt' => SlideModule::t('slide', 'Chọn ngôn ngữ...')])
                ->label(SlideModule::t('slide', 'Ngôn ngữ')) ?>

        </div>
    </div>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'slide_category')
                ->dropDownList(ArrayHelper::map(SlideCategoryTable::getAllSlideCategory($model->language), 'id', 'title'), ['prompt' => 'Chọn danh mục...'])->label('Danh mục') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'slide_type')->dropDownList(ArrayHelper::map(SlideTypeTable::getAllSlideType($model->language), 'id', 'title'), ['prompt' => 'Chọn loại...'])->label('Loại') ?>
        </div>
    </div>

    <?= $form->field($model, 'description')->widget(\modava\tiny\TinyMce::class, []) ?>

    <?php
    if (empty($model->getErrors()))
        $path = Yii::$app->params['slide']['150x150']['folder'];
    else
        $path = null;
    echo \modava\tiny\FileManager::widget([
        'model' => $model,
        'attribute' => 'image',
        'path' => $path,
        'label' => SlideModule::t('slide', 'Hình ảnh') . ': ' . Yii::$app->params['slide-size'],
    ]); ?>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(SlideModule::t('slide', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<?php
$urlLoadCategories = Url::toRoute(['load-categories-by-lang']);
$urlLoadTypes = Url::toRoute(['load-types-by-lang']);
$script = <<< JS
function loadDataByLang(url, lang){
    return new Promise((resolve) => {
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            data: {
                lang: lang
            }
        }).done(res => {
            resolve(res);
        }).fail(f => {
            resolve(null);
        });
    });
}
$('body').on('change', '#slide-language', async function(){
    var v = $(this).val(),
        categories, types;
    $('#slide-slide_category, #slide-slide_type').find('option[value!=""]').remove();
    await loadDataByLang('$urlLoadCategories', v).then(res => categories = res);
    await loadDataByLang('$urlLoadTypes', v).then(res => types = res);
    if(typeof categories === "string"){
        $('#slide-slidecategory').append(categories);
    } else if(typeof categories === "object"){
        Object.keys(categories).forEach(function(k){
            $('#slide-slide_category').append('<option value="'+ k +'">'+ categories[k] +'</option>');
        });
    }
    if(typeof types === "string"){
        $('#slide-slide_type').append(types);
    } else if(typeof types === "object"){
        Object.keys(types).forEach(function(k){
            $('#slide-slide_type').append('<option value="'+ k +'">'+ types[k] +'</option>');
        });
    }
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);