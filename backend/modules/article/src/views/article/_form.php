<?php

use modava\article\models\table\ArticleTypeTable;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use modava\article\ArticleModule;
use yii\helpers\ArrayHelper;
use modava\article\models\table\ActicleCategoryTable;

/* @var $this yii\web\View */
/* @var $model modava\article\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="article-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <div class="row">
            <div class="col-4">
                <?= $form->field($model, 'language')->dropDownList(Yii::$app->getModule('article')->params['availableLocales'])->label(ArticleModule::t('article', 'Ngôn ngữ')) ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'category_id')
                    ->dropDownList(ArrayHelper::map(ActicleCategoryTable::getAllArticleCategory(), 'id', 'title'))
                    ->label(ArticleModule::t('article', 'Danh mục')) ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'type_id')
                    ->dropDownList(\yii\helpers\ArrayHelper::map(ArticleTypeTable::getAllArticleType(), 'id', 'title'))
                    ->label(ArticleModule::t('article', 'Thể loại')) ?>
            </div>
        </div>

        <?= $form->field($model, 'description')->widget(\modava\tiny\TinyMce::class, [
            'options' => ['rows' => 6],
        ]) ?>

        <?= $form->field($model, 'content')->widget(\modava\tiny\TinyMce::class, [
            'options' => ['rows' => 15],
            'type' => 'content',
        ]) ?>

        <?= \modava\tiny\FileManager::widget([
            'model' => $model,
            'attribute' => 'image',
            'label' => ArticleModule::t('article', 'Hình ảnh') . ': 150x150px'
        ]); ?>

        <?php if (Yii::$app->controller->action->id == 'create')
            $model->status = 1;
        ?>

        <?= $form->field($model, 'status')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton(ArticleModule::t('article', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php
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
            if(res.code === 200){
                resolve(res.data);
            } else {
                resolve(null);
            }
        }).fail(f => {
            resolve(null);
        });
    });
}
$('body').on('change', '#article-language', function(){
    var v = $(this).val(),
        categories, types;
    loadDataByLang('', lang).then(res => {})
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);
