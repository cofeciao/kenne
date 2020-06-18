<?php

use common\widgets\assets\Select2Asset;
use yii\helpers\Html;
use yii\helpers\Url;
use modava\product\models\table\ProductTable;
use modava\product\models\table\ProductCategoryTable;
use modava\customer\models\CustomerPayment;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\customer\CustomerModule;
use common\widgets\Select2;
use yii\helpers\ArrayHelper;
use unclead\multipleinput\MultipleInput;
use modava\customer\models\table\CustomerTable;
use modava\customer\components\CustomerDateTimePicker;

/* @var $this yii\web\View */
/* @var $model modava\customer\models\CustomerOrder */
/* @var $form yii\widgets\ActiveForm */

Select2Asset::register($this);

$options_price = [];
foreach (ArrayHelper::map(ProductTable::getAll(Yii::$app->language), 'id', 'price') as $id => $price) {
    $options_price[$id] = [
        'price' => $price
    ];
}

$model->ordered_at = date('d-m-Y H:i', $model->ordered_at != null ? $model->ordered_at : time());
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
    <div class="customer-order-form">
        <?php $form = ActiveForm::begin([
            'id' => 'form-order',
            'enableAjaxValidation' => true,
            'validationUrl' => Url::toRoute(['validate-order', 'customer_id' => Yii::$app->request->get('customer_id'), 'id' => $model->primaryKey])
        ]); ?>
        <div class="row">
            <?php if ($model->customer_id == null) { ?>
                <div class="col-md-6 col-12">
                    <?= Select2::widget([
                        'model' => $model,
                        'attribute' => 'customer_id',
                        'data' => ArrayHelper::map(CustomerTable::getCustomerDongY(), 'id', 'name'),
                        'options' => [
                            'prompt' => 'Chọn khách hàng...'
                        ]
                    ]) ?>
                </div>
            <?php } ?>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'ordered_at')->widget(CustomerDateTimePicker::class, [
                    'template' => '{input}{button}',
                    'pickButtonIcon' => 'btn btn-increment btn-light',
                    'pickIconContent' => Html::tag('span', '', ['class' => 'glyphicon glyphicon-th']),
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy hh:ii',
                        'todayHighLight' => true,
                    ]
                ]) ?>
            </div>
        </div>
        <?= $form->field($model, 'order_detail')->widget(MultipleInput::class, [
            'id' => 'order-detail',
            'max' => 6,
            'allowEmptyList' => false,
            'columns' => [
                [
                    'name' => 'product_id',
                    'type' => 'dropdownList',
                    'title' => CustomerModule::t('customer', 'Product ID'),
                    'enableError' => true,
                    'items' => ArrayHelper::map(ProductTable::getAll(Yii::$app->language), 'id', 'title'),
                    'options' => [
                        'prompt' => CustomerModule::t('customer', 'Chọn sản phẩm...'),
                        'class' => 'form-control select-product',
                        'options' => $options_price
                    ]
                ],
                [
                    'name' => 'qty',
                    'title' => CustomerModule::t('customer', 'Qty'),
                    'enableError' => true,
                    'defaultValue' => 1,
                    'options' => [
                        'type' => 'number',
                        'min' => 1,
                        'step' => 1
                    ]
                ],
                [
                    'name' => 'price',
                    'title' => CustomerModule::t('customer', 'Price'),
                    'enableError' => true,
                    'defaultValue' => 1,
                    'options' => [
                        'disabled' => true
                    ]
                ],
                [
                    'name' => 'total_price',
                    'title' => CustomerModule::t('customer', 'Total Price'),
                    'enableError' => true,
                    'defaultValue' => 1,
                    'options' => [
                        'disabled' => true
                    ]
                ],
                [
                    'name' => 'discount',
                    'title' => CustomerModule::t('customer', 'Discount'),
                    'enableError' => true,
                    'defaultValue' => 0,
                    'options' => [
                        'type' => 'number',
                        'min' => 0
                    ]
                ],
                [
                    'name' => 'discount_by',
                    'type' => 'dropdownList',
                    'title' => CustomerModule::t('customer', 'Discount By'),
                    'enableError' => true,
                    'items' => CustomerPayment::DISCOUNT,
                    'defaultValue' => 1,
                ],
                [
                    'name' => 'total',
                    'title' => CustomerModule::t('customer', 'Total'),
                    'enableError' => true,
                    'defaultValue' => 1,
                    'options' => [
                        'disabled' => true
                    ]
                ],
            ]
        ])->label(false);
        ?>
    </div>
<?= $form->field($model, 'discount')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton(CustomerModule::t('customer', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>
    </div>
<?php
$discount_by_money = CustomerPayment::DISCOUNT_BY_MONEY;
$discount_by_percent = CustomerPayment::DISCOUNT_BY_PERCENT;
$script = <<< JS
$('#order-detail').on('afterInit', function(){
    $('#order-detail .select-product').each(function(){
        $(this).select2();
    });
}).on('afterAddRow', function(){
    $('#order-detail .select-product').each(function(){
        $(this).select2();
    });
});
$('#order-detail').on('change', '', function(){});
JS;
$this->registerJs($script, \yii\web\View::POS_END);