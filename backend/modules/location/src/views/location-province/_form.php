<?php

use yii\web\View;
use yii\helpers\Url;
use yii\helpers\Html;
use modava\select2\Select2;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\location\LocationModule;
use yii\helpers\ArrayHelper;
use modava\location\models\table\LocationCountryTable;

/* @var $this yii\web\View */
/* @var $model modava\location\models\LocationProvince */
/* @var $form yii\widgets\ActiveForm */
?>
<?php ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
    <div class="location-province-form">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= Select2::widget([
                    'model' => $model,
                    'attribute' => 'Type',
                    'data' => [
                        'Thành Phố' => 'Thành Phố',
                        'Tỉnh' => 'Tỉnh',
                    ]
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'TelephoneCode')->textInput() ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'ZipCode')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= Select2::widget([
                    'model' => $model,
                    'attribute' => 'CountryId',
                    'data' => ArrayHelper::map(LocationCountryTable::getAllCountry(Yii::$app->language), 'id', 'CommonName'),
                    'options' => [
                        'prompt' => Yii::t('backend', 'Chọn quốc gia...'),
                        'id' => 'select-country'
                    ]
                ]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'SortOrder')->textInput() ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'language')->dropDownList(['vi' => 'Vi', 'en' => 'En', 'jp' => 'Jp',], [
                    'class' => 'form-control load-data-on-change',
                    'load-data-url' => Url::toRoute(['/location/location-country/get-country-by-lang']),
                    'load-data-element' => '#select-country',
                    'load-data-key' => 'lang',
                    'load-data-method' => 'GET',
                    'load-data-callback' => '$("#select-country").select2();'
                ]) ?>
            </div>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'SortOrder')->textInput() ?>
        </div>
        <div class="col-6">
<<<<<<< HEAD
            <?= $form->field($model, 'language')->dropDownList(Yii::$app->getModule('location')->params['availableLocales'], ['prompt' => 'Chọn ngôn ngữ...']) ?>
=======
            <?= $form->field($model, 'language')->dropDownList(Yii::$app->params['availableLocales'], ['prompt' => 'Chọn ngôn ngữ...']) ?>
>>>>>>> master
        </div>

        <?php ActiveForm::end(); ?>
    </div>
<?php
$script = <<< JS
$('body').on('change', '#locationprovince-language', function(){
    
});
JS;
$this->registerJs($script, View::POS_END);