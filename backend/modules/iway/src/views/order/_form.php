<?php

use backend\widgets\ToastrWidget;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use modava\iway\helpers\Utils;
use modava\iway\models\table\CoSoTable;
use modava\product\models\table\ProductTable;
use unclead\multipleinput\MultipleInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Order */
/* @var $form yii\widgets\ActiveForm */

if (!$model->primaryKey) {
    $model->order_date = date('d-m-Y');
    $model->status = 'moi';
    $model->final_total = 0;
    $model->total = 0;
    $model->discount = 0;
} else {
    $model->order_date = Utils::convertDateToDisplayFormat($model->order_date);
}

?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
    <div class="order-form">
        <?php $form = ActiveForm::begin(); ?>
        <section class="hk-sec-wrapper mb-4">
            <h5 class="hk-sec-title">Thông tin đơn hàng</h5>
            <div class="row">
                <div class="col-6">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-6">
                    <?= $form->field($model, 'co_so_id')->dropDownList(ArrayHelper::map(CoSoTable::getAll(), 'id', 'title'), [
                        'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                    ]) ?>
                </div>
                <div class="col-6">
                    <?= $form->field($model, 'customer_id')->widget(Select2::class, [
                        'value' => $model->customer_id,
                        'initValueText' => $model->customer_id ? $model->customer->fullname : '',
                        'options' => ['placeholder' => Yii::t('backend', 'Chọn một giá trị ...')],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'minimumInputLength' => 3,
                            'language' => [
                                'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                            ],
                            'ajax' => [
                                'url' => Url::toRoute(['/iway/customer/get-customer-by-key-word']),
                                'dataType' => 'json',
                                'data' => new JsExpression('function(params) { return {q:params.term}; }')
                            ],
                            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                            'templateResult' => new JsExpression('function(model) { return model.text; }'),
                            'templateSelection' => new JsExpression('function (model) { return model.text; }'),
                        ],
                    ]); ?>
                </div>
                <div class="col-6">
                    <?= $form->field($model, 'order_date')->widget(DatePicker::class, [
                        'addon' => '<button type="button" class="btn btn-increment btn-light"><i class="ion ion-md-calendar"></i></button>',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-mm-yyyy',
                            'todayHighlight' => true,
                        ]
                    ]) ?>
                </div>
                <div class="col-6">

                    <?= $form->field($model, 'status')->dropDownList($model->getDropdown('status'), [
                        'prompt' => Yii::t('backend', 'Chọn một giá trị ...')
                    ]) ?>
                </div>
                <div class="col-3">
                    <?= $form->field($model, 'payment_status')->dropDownList($model->getDropdown('payment_status'), [
                        'prompt' => Yii::t('backend', 'Chọn một giá trị ...'),
                        'disabled' => true
                    ]) ?>
                </div>
                <div class="col-3">
                    <?= $form->field($model, 'service_status')->dropDownList($model->getDropdown('service_status'), [
                        'prompt' => Yii::t('backend', 'Chọn một giá trị ...'),
                        'disabled' => true
                    ]) ?>
                </div>
                <div class="col-6">

                </div>
                <div class="col-6">

                </div>
                <div class="col-6">

                </div>
            </div>
        </section>

        <section class="hk-sec-wrapper mb-4 text-right">
            <h5 class="hk-sec-title text-left">Chi tiết đơn hàng</h5>
            <div class="row text-left p-4">
                <?= $form->field($model, 'line_item')->widget(MultipleInput::class, [
                    'id' => 'salesorder_detail',
                    'max' => 30,
                    'allowEmptyList' => false,
                    'rowOptions' => [
                        'class' => 'line_item'
                    ],
                    'addButtonOptions' => [
                        'class' => 'btn btn-sm btn-success px-3',
                        'label' => '<i class="fa fa-plus"></i>' // also you can use html code
                    ],
                    'removeButtonOptions' => [
                        'label' => '<i class="fa fa-minus"></i>',
                        'class' => 'btn btn-sm btn-light px-3',
                    ],
                    'columns' => [
                        [
                            'name' => 'id',
                            'type' => 'hiddenInput',
                            'title' => '',
                            'enableError' => true,
                            'options' => [
                                'class' => 'hidden',
                            ]
                        ],
                        [
                            'name' => 'product_id',
                            'type' => Select2::class,
                            'title' => Yii::t('backend', 'Sản phẩm'),
                            'enableError' => true,
                            'options' => [
                                'name' => 'product_id',
                                'data' => ArrayHelper::map(ProductTable::getAll(), 'id', 'title'),
                                'options' => ['placeholder' => Yii::t('backend', 'Chọn một giá trị ...'),
                                    'class' => 'product-id'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],

                            ],
                            'headerOptions' => [
                                'style' => 'min-width: 250px;',
                            ],
                        ],
                        [
                            'name' => 'quantity',
                            'title' => Yii::t('backend', 'Số lượng'),
                            'enableError' => true,
                            'defaultValue' => 1,
                            'options' => [
                                'style' => 'max-width: 100px',
                                'type' => 'number',
                                'min' => 1,
                                'max' => 500,
                                'class' => 'text-right product-qty'
                            ]
                        ],
                        [
                            'name' => 'price',
                            'title' => Yii::t('backend', 'Giá') . ' (₫)',
                            'enableError' => true,
                            'defaultValue' => '0',
                            'options' => [
                                'style' => 'width: 130px',
                                'class' => 'text-right product-price',
                                'readonly' => true
                            ]
                        ],
                        [
                            'name' => 'discount',
                            'title' => Yii::t('backend', 'Chiết khấu'),
                            'enableError' => true,
                            'defaultValue' => 0,
                            'options' => [
                                'style' => 'width: 120px',
                                'class' => 'discount-value text-right',
                            ]
                        ],
                        [
                            'name' => 'discount_type',
                            'title' => Yii::t('backend', 'Theo'),
                            'type' => 'dropdownList',
                            'enableError' => true,
                            'defaultValue' => '',
                            'items' => Yii::$app->getModule('iway')->params['discount_type'],
                            'options' => [
                                'style' => 'width: 60px',
                                'class' => 'discount-type'
                            ]
                        ],
                        [
                            'name' => 'description',
                            'title' => Yii::t('backend', 'Ghi chú'),
                            'enableError' => true,
                            'defaultValue' => '',
                            'options' => [
                                'type' => 'textarea'
                            ]
                        ],
                        [
                            'name' => 'sub_total',
                            'type' => 'static',
                            'defaultValue' => 0,
                            'options' => [
                                'style' => 'min-width: 150px',
                                'class' => 'text-right lineitem-total'
                            ],
                            'title' => Yii::t('backend', 'Thành tiền') . ' (₫)'
                        ]
                    ]
                ])->label(false);
                ?>
            </div>

            <div class="row justify-content-end p-1">
                <div class="col-3 border-top pt-2"><?= $model->getAttributeLabel('total') ?>:</div>
                <div class="col-4 border-top pt-2">
                    <h5 id="total"><?= Yii::$app->formatter->asCurrency($model->total) ?></h5>
                    <div class="d-none">
                        <?= $form->field($model, 'total')->input('hidden')->label(false) ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end p-1">
                <div class="col-3 form-group mb-0 position-relative">
                    <span><?= $model->getAttributeLabel('discount') ?>:</span>
                    <div class="discount-container" style="position: absolute;left: 100%;top: -8px;width: 350px;z-index: 1000;">
                        <div class="input-group w-50">
                            <div class="input-group-prepend">
                                <?= $form->field($model, 'discount_type', ['template' => '{input}', 'options' => ['tag' => false]])->dropDownList(Yii::$app->getModule('iway')->params['discount_type']) ?>
                            </div>
                            <?= $form->field($model, 'discount_value', ['template' => '{input}', 'options' => ['tag' => false]])->textInput() ?>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <h5 id="discount"><?= Yii::$app->formatter->asCurrency($model->discount) ?></h5>
                    <div class="d-none">
                        <?= $form->field($model, 'discount')->input('hidden')->label(false) ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end p-1">
                <div class="col-3"><?= $model->getAttributeLabel('final_total') ?>:</div>
                <div class="col-4">
                    <h4 id="final_total"><?= Yii::$app->formatter->asCurrency($model->final_total) ?></h4>
                    <div class="d-none">
                        <?= $form->field($model, 'final_total')->input('hidden')->label(false) ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

<?php
$urlGetProductInfo = Url::toRoute(['/product/product/get-product-info']);

/* Khai báo biến js được truyền từ PHP ở đây, xử lý JS ở file order/edit.js */
$script = <<< JS
    const urlGetProductInfo = '$urlGetProductInfo',
        GIAM_GIA_TRUC_TIEP = '1',
        GIAM_GIA_PHAN_TRAM = '2';
    
JS;
$this->registerJs($script, \yii\web\View::POS_END);
$this->registerJsFile(Yii::$app->assetManager->publish('@modava/iway/web/js/order/edit.js')[1], ['position' => \yii\web\View::POS_END]);