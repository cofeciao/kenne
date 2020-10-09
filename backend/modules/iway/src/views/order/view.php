<?php

use backend\widgets\ToastrWidget;
use modava\iway\widgets\NavbarWidgets;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Order */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-view']) ?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Yii::t('backend', 'Chi tiết'); ?>
            : <?= Html::encode($this->title) ?>
        </h4>
        <p>
            <a class="btn btn-outline-light btn-sm" href="<?= Url::to(['create']); ?>"
               title="<?= Yii::t('backend', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= Yii::t('backend', 'Create'); ?></a>
            <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
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
                <h5 class="hk-sec-title">Thông tin đơn hàng</h5>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'title',
                        'code',
                        [
                            'attribute' => 'co_so_id',
                            'format' => 'raw',
                            'value' => function (modava\iway\models\Order $model) {
                                return Html::a($model->coSo->title, Url::toRoute(['co-so/view', 'id' => $model->co_so_id]));
                            }
                        ],
                        [
                            'attribute' => 'customer_id',
                            'format' => 'raw',
                            'value' => function (modava\iway\models\Order $model) {
                                return Html::a($model->customer->fullname, Url::toRoute(['co-so/view', 'id' => $model->customer_id]));
                            }
                        ],
                        'order_date:date',
                        [
                            'attribute' => 'status',
                            'value' => function (modava\iway\models\Order $model) {
                                return $model->getDisplayDropdown($model->status, 'status');
                            }
                        ],
                        [
                            'attribute' => 'payment_status',
                            'value' => function (modava\iway\models\Order $model) {
                                return $model->getDisplayDropdown($model->payment_status, 'payment_status');
                            }
                        ],
                        [
                            'attribute' => 'service_status',
                            'value' => function (modava\iway\models\Order $model) {
                                return $model->getDisplayDropdown($model->service_status, 'service_status');
                            }
                        ],
                        'total',
                        'discount',
                        'final_total',
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

            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Chi tiết đơn hàng</h5>
                <?php Pjax::begin(); ?>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="dataTables_wrapper dt-bootstrap4">
                                <?= GridView::widget([
                                    'dataProvider' => $orderDetailDataProvider,
                                    'layout' => '
                                        {errors}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                {items}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" role="status" aria-live="polite">
                                                    {pager}
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="dataTables_paginate paging_simple_numbers">
                                                    {summary}
                                                </div>
                                            </div>
                                        </div>
                                    ',
                                    'pager' => [
                                        'firstPageLabel' => Yii::t('backend', 'First'),
                                        'lastPageLabel' => Yii::t('backend', 'Last'),
                                        'prevPageLabel' => Yii::t('backend', 'Previous'),
                                        'nextPageLabel' => Yii::t('backend', 'Next'),
                                        'maxButtonCount' => 5,

                                        'options' => [
                                            'tag' => 'ul',
                                            'class' => 'pagination',
                                        ],

                                        // Customzing CSS class for pager link
                                        'linkOptions' => ['class' => 'page-link'],
                                        'activePageCssClass' => 'active',
                                        'disabledPageCssClass' => 'disabled page-disabled',
                                        'pageCssClass' => 'page-item',

                                        // Customzing CSS class for navigating link
                                        'prevPageCssClass' => 'paginate_button page-item',
                                        'nextPageCssClass' => 'paginate_button page-item',
                                        'firstPageCssClass' => 'paginate_button page-item',
                                        'lastPageCssClass' => 'paginate_button page-item',
                                    ],
                                    'columns' => [
                                        [
                                            'class' => 'yii\grid\SerialColumn',
                                            'header' => 'STT',
                                            'headerOptions' => [
                                                'width' => 60,
                                                'rowspan' => 2
                                            ],
                                            'filterOptions' => [
                                                'class' => 'd-none',
                                            ],
                                        ],

                                        [
                                            'attribute' => 'product_id',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return Html::a($model->product->title, ['/product/product/view', 'id' => $model->product->id], ['target' => '_blank', 'data-pjax' => 0]);
                                            }
                                        ],
                                        [
                                            'attribute' => 'qty',
                                            'format' => 'decimal',
                                            'contentOptions' => [
                                                'class' => 'text-right',
                                            ]
                                        ],
                                        [
                                            'attribute' => 'price',
                                            'format' => 'currency',
                                            'contentOptions' => [
                                                'class' => 'text-right',
                                            ]
                                        ],
                                        [
                                            'label' => Yii::t('backend', 'Giảm giá'),
                                            'value' => function ($model) {
                                                return $model->discount_value . ' ' . Yii::$app->getModule('iway')->params['discount_type'][$model->discount_type];
                                            },
                                            'contentOptions' => [
                                                'class' => 'text-right',
                                            ]
                                        ],
                                        [
                                            'attribute' => 'discount',
                                            'format' => 'currency',
                                            'contentOptions' => [
                                                'class' => 'text-right',
                                            ]
                                        ],
                                        'description',
                                        [
                                            'attribute' => 'final_total',
                                            'format' => 'currency',
                                            'contentOptions' => [
                                                'class' => 'text-right',
                                            ],
                                        ],
                                    ],
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php Pjax::end(); ?>
            </section>
        </div>
    </div>
</div>
