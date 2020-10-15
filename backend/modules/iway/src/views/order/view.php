<?php

use backend\widgets\ToastrWidget;
use modava\auth\models\UserProfile;
use modava\iway\models\Order;
use modava\iway\models\OrderDetail;
use modava\iway\widgets\NavbarWidgets;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
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
            <?= Html::a(Yii::t('backend', 'Tạo lịch trình điều trị'), Url::toRoute(['iway/doctor-view', 'AppointmentSchedule[order_id]' => $model->primaryKey]), ['class' => 'btn btn-sm btn-primary', 'target' => '_blank']) ?>
            <?= Html::a(Yii::t('backend', 'Tạo phiếu thu'), Url::toRoute(['receipt/create', 'Receipt[order_id]' => $model->primaryKey]), ['class' => 'btn btn-sm btn-success', 'target' => '_blank']) ?>
            <?php if ($model->status != 'huy'):?>
            <?= Html::a(Yii::t('backend', 'Hủy đơn'), 'javascript:updateRecordAjax(' . $model->primaryKey . ', ' . json_encode(['status' => 'huy']) . ', "'  . Url::toRoute(['update-ajax']) .'", "Bạn muốn hủy đơn", "")', ['class' => 'btn btn-sm btn-warning']) ?>
            <?php endif;?>
            <a class="btn btn-outline-light btn-sm" href="<?= Url::to(['create']); ?>"
               title="<?= Yii::t('backend', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= Yii::t('backend', 'Create'); ?></a>
            <?php if ($model->status != 'huy'):?>
            <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?php endif;?>
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
            <section class="hk-sec-wrapper mb-2">
                <div class="d-flex">
                    <h5 class="hk-sec-title">Thông tin đơn hàng</h5>
                    <ul class="nav ml-auto">
                        <li><?= Html::a(Yii::t('backend', 'Phiếu thu'), Url::toRoute(['receipt/index', 'ReceiptSearch[order_id]' => $model->primaryKey]), ['class' => 'btn btn-sm btn-success']) ?></li>
                    </ul>
                </div>

                <table class="table table-no-bordered">
                    <tr>
                        <td class="w-20 border-top-0 py-2 px-3"><?= $model->getAttributeLabel('title') ?></td>
                        <td class="w-30 border-top-0 py-2 px-3"><?= $model->title ?></td>
                        <td class="w-20 border-top-0 py-2 px-3"><?= $model->getAttributeLabel('co_so_id') ?></td>
                        <td class="w-30 border-top-0 py-2 px-3"><?= $model->getDisplayRelatedField('co_so_id', 'coSo', 'co-so') ?></td>
                    </tr>
                    <tr>
                        <td class="w-20 py-2 px-3"><?= $model->getAttributeLabel('customer_id') ?></td>
                        <td class="w-30 py-2 px-3"><?= $model->getDisplayRelatedField('customer_id', 'customer', 'customer', 'fullname') ?></td>
                        <td class="w-20 py-2 px-3"><?= $model->getAttributeLabel('order_date') ?></td>
                        <td class="w-30 py-2 px-3"><?= Yii::$app->formatter->asDate($model->order_date) ?></td>
                    </tr>
                    <tr>
                        <td class="w-20 py-2 px-3"><?= $model->getAttributeLabel('status') ?></td>
                        <td class="w-30 py-2 px-3"><?= $model->status === 'hoan_thanh' ? Html::tag('span', $model->getDisplayDropdown($model->status, 'status'), ['class' => 'badge badge-success font-12']) : $model->getDisplayDropdown($model->status, 'status') ?></td>
                        <td class="w-20 py-2 px-3"></td>
                        <td class="w-30 py-2 px-3"></td>
                    </tr>
                    <tr>
                        <td class="w-20 py-2 px-3"><?= $model->getAttributeLabel('payment_status') ?></td>
                        <td class="w-30 py-2 px-3"><?= $model->getDisplayDropdown($model->payment_status, 'payment_status') ?></td>
                        <td class="w-20 py-2 px-3"><?= $model->getAttributeLabel('service_status') ?></td>
                        <td class="w-30 py-2 px-3"><?= $model->getDisplayDropdown($model->service_status, 'service_status') ?></td>
                    </tr>
                    <tr>
                        <td class="w-20 py-2 px-3"><?= $model->getAttributeLabel('created_at') ?></td>
                        <td class="w-30 py-2 px-3"><?= Yii::$app->formatter->asDatetime($model->created_at) ?></td>
                        <td class="w-20 py-2 px-3"><?= $model->getAttributeLabel('updated_at') ?></td>
                        <td class="w-30 py-2 px-3"><?= Yii::$app->formatter->asDatetime($model->updated_at) ?></td>
                    </tr>
                    <tr>
                        <td class="w-20 py-2 px-3"><?= $model->getAttributeLabel('created_by') ?></td>
                        <td class="w-30 py-2 px-3"><?= UserProfile::findOne($model->created_by)->fullname ?></td>
                        <td class="w-20 py-2 px-3"><?= $model->getAttributeLabel('updated_by') ?></td>
                        <td class="w-30 py-2 px-3"><?= UserProfile::findOne($model->updated_by)->fullname ?></td>
                    </tr>
                </table>
            </section>

            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Chi tiết đơn hàng</h5>
                <?php Pjax::begin(); ?>
                <div class="row mb-4">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="dataTables_wrapper dt-bootstrap4">
                                <?= GridView::widget([
                                    'dataProvider' => new ActiveDataProvider([
                                        'query' => OrderDetail::find()->where(['order_id' => $model->primaryKey]),
                                        'sort' => false
                                    ]),
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
                                                return $model->getDisplayRelatedField('product_id', 'product', '/product/product');
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
                                                if ($model->discount_type == Order::GIAM_GIA_TRUC_TIEP) {
                                                    return Yii::$app->formatter->asDecimal($model->discount_value) . ' ' . Yii::$app->getModule('iway')->params['discount_type'][$model->discount_type];
                                                }
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


                <div class="row justify-content-end p-1 text-right">
                    <div class="col-3 border-top pt-2"><?= $model->getAttributeLabel('total') ?>:</div>
                    <div class="col-4 border-top pt-2">
                        <p id="total" class="text-right"><?= Yii::$app->formatter->asCurrency($model->total) ?></p>
                    </div>
                </div>
                <div class="row justify-content-end p-1 text-right">
                    <div class="col-3 form-group mb-0 position-relative">
                        <span><?= $model->getAttributeLabel('discount') ?>:</span>
                        <div class="discount-container" style="position: absolute;left: 100%;top: -8px;width: 350px;z-index: 1000;">
                            <div class="input-group w-50">
                                <div class="input-group-prepend">
                                    <select name="" id="" class="form-control" disabled>
                                        <option value="" selected><?= Yii::$app->getModule('iway')->params['discount_type'][$model->discount_type] ?></option>
                                    </select>
                                </div>
                                <input type="text" value="<?= Yii::$app->formatter->asDecimal($model->discount_value) ?>" class="form-control text-right" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <p id="discount" class="text-right"><?= Yii::$app->formatter->asCurrency($model->discount) ?></p>
                    </div>
                </div>
                <div class="row justify-content-end p-1 text-right">
                    <div class="col-3 font-18"><?= $model->getAttributeLabel('final_total') ?>:</div>
                    <div class="col-4">
                        <p id="final_total" class="font-weight-bold font-18"><?= Yii::$app->formatter->asCurrency($model->final_total) ?></p>
                    </div>
                </div>
                <div class="row justify-content-end p-1 text-right">
                    <div class="col-3 font-14"><?= $model->getAttributeLabel('received') ?>:</div>
                    <div class="col-4">
                        <p id="received" class="font-14"><?= Yii::$app->formatter->asCurrency($model->received) ?></p>
                    </div>
                </div>
                <div class="row justify-content-end p-1 text-right">
                    <div class="col-3 font-14"><?= $model->getAttributeLabel('balance') ?>:</div>
                    <div class="col-4">
                        <p id="balance" class="font-weight-bold font-14"><?= Yii::$app->formatter->asCurrency($model->balance) ?></p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
