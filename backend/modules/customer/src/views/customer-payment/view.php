<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\customer\widgets\NavbarWidgets;
use modava\customer\CustomerModule;
use modava\customer\models\table\CustomerPaymentTable;

/* @var $this yii\web\View */
/* @var $model modava\customer\models\CustomerPayment */

$this->title = Yii::t('backend', 'Payment') . ': ' . $model->orderHasOne->customerHasOne->name . ' (' . $model->orderHasOne->code . ')';
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Customer Payments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-view']) ?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <p>
            <a class="btn btn-outline-light btn-sm" href="<?= Url::to(['create']); ?>"
               title="<?= Yii::t('backend', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= Yii::t('backend', 'Create'); ?></a>
            <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-sm',
                'data' => [
                    'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        [
                            'attribute' => 'orderHasOne.customer_id',
                            'label' => Yii::t('backend', 'Customers'),
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a($model->orderHasOne->customerHasOne->name, ['/customer/customer/view', 'id' => $model->orderHasOne->customer_id], [
                                    'target' => '_blank'
                                ]);
                            }
                        ],
                        [
                            'attribute' => 'order_id',
                            'label' => Yii::t('backend', 'Order'),
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a($model->orderHasOne->code, ['/customer/customer-order/view', 'id' => $model->order_id], [
                                    'target' => '_blank'
                                ]);
                            }
                        ],
                        'price',
                        [
                            'attribute' => 'payments',
                            'value' => function ($model) {
                                if (array_key_exists($model->payments, CustomerPaymentTable::PAYMENTS)) return CustomerPaymentTable::PAYMENTS[$model->payments];
                                return CustomerPaymentTable::PAYMENTS[CustomerPaymentTable::PAYMENTS_THANH_TOAN];
                            }
                        ],
                        [
                            'attribute' => 'type',
                            'value' => function ($model) {
                                if (array_key_exists($model->type, CustomerPaymentTable::TYPE)) return CustomerPaymentTable::TYPE[$model->type];
                                return CustomerPaymentTable::TYPE[CustomerPaymentTable::TYPE_TIEN_MAT];
                            }
                        ],
                        'co_so',
                        'payment_at:datetime',
                        'created_at:datetime',
                        'updated_at:datetime',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => Yii::t('backend', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => Yii::t('backend', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
