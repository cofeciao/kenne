<?php

use kartik\select2\Select2;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\iway\IwayModule;
use \modava\iway\models\DropdownsConfig;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\DropdownsConfig */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="dropdowns-config-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'table_name')->widget(Select2::class, [
                'data' => DropdownsConfig::getAllTables(),
                'options' => [
                    'placeholder' => IwayModule::t('iway', 'Chọn table...'),
                    'load-data-element' => '#field_name',
                    'load-data-url' => Url::toRoute(['get-columns']),
                    'load-data-key' => 'table_name',
                    'load-data-method' => 'GET',
                    'class' => ' load-data-on-change',
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]); ?>
        </div>
        <div class="col-6">
            <?= $form->field($model,
                'field_name')->widget(Select2::class, [
                'data' => DropdownsConfig::getAllColumns($model->table_name),
                'options' => [
                    'placeholder' => IwayModule::t('iway', 'Chọn table...'),
                    'id' => 'field_name'
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]); ?>
        </div>
        <div class="col-12 row">
            <div class="col-6">
                <?= $form->field($model, 'dropdown_value')->widget(MultipleInput::class, [
                    'id' => 'dropdown_value',
                    'max' => 99,
                    'allowEmptyList' => false,
                    'rowOptions' => [
                        'class' => 'lineitem'
                    ],
                    'columns' => [
                        [
                            'name' => 'key',
                            'title' => IwayModule::t('test', 'Key'),
                            'enableError' => true,
                            'defaultValue' => '',
                            'options' => [
                                'class' => 'form-control dropdown-key',
                            ]
                        ],
                        [
                            'name' => 'value',
                            'title' => IwayModule::t('test', 'Value'),
                            'enableError' => true,
                            'defaultValue' => '',
                            'options' => [
                                'class' => 'dropdown-value',
                                'placeholder' => IwayModule::t('iway', 'Gõ ở đây...')
                            ]
                        ],
                    ]
                ])->label(false);
                ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(IwayModule::t('iway', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
