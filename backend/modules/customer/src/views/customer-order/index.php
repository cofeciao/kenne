<?php

use modava\customer\CustomerModule;
use modava\customer\widgets\NavbarWidgets;
use yii\helpers\Html;
use common\grid\MyGridView;
use backend\widgets\ToastrWidget;
use yii\widgets\Pjax;
use modava\customer\models\table\CustomerOrderTable;

/* @var $this yii\web\View */
/* @var $searchModel modava\customer\models\search\CustomerOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Đơn hàng');
if ($searchModel->customerHasOne != null) $this->title .= ': ' . $searchModel->customerHasOne->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $searchModel->toastr_key . '-index']) ?>
    <div class="container-fluid px-xxl-25 px-xl-10">
        <?= NavbarWidgets::widget(); ?>

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                            class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
            </h4>
            <a class="btn btn-outline-light btn-sm"
               href="<?= \yii\helpers\Url::to(['create', 'customer_id' => Yii::$app->request->get('customer_id')]); ?>"
               title="<?= Yii::t('backend', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= Yii::t('backend', 'Create'); ?></a>
        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper index">

                    <?php Pjax::begin(['id' => 'customer-pjax', 'timeout' => false, 'enablePushState' => true, 'clientOptions' => ['method' => 'GET']]); ?>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="dataTables_wrapper dt-bootstrap4">
                                    <?= MyGridView::widget([
                                        'dataProvider' => $dataProvider,
                                        'layout' => '
                                            {errors} 
                                            <div class="pane-single-table">
                                                {items}
                                            </div>
                                            <div class="pager-wrap clearfix">
                                                {summary}' .
                                            Yii::$app->controller->renderPartial('@backend/views/layouts/my-gridview/_pageTo', [
                                                'totalPage' => $totalPage,
                                                'currentPage' => Yii::$app->request->get($dataProvider->getPagination()->pageParam)
                                            ]) .
                                            Yii::$app->controller->renderPartial('@backend/views/layouts/my-gridview/_pageSize') .
                                            '{pager}
                                            </div>
                                        ',
                                        'tableOptions' => [
                                            'id' => 'dataTable',
                                            'class' => 'dt-grid dt-widget pane-hScroll',
                                        ],
                                        'myOptions' => [
                                            'class' => 'dt-grid-content my-content pane-vScroll',
                                            'data-minus' => '{"0":95,"1":".hk-navbar","2":".nav-tabs","3":".hk-pg-header","4":".hk-footer-wrap"}'
                                        ],
                                        'summaryOptions' => [
                                            'class' => 'summary pull-right',
                                        ],
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
                                            'prevPageCssClass' => 'paginate_button page-item prev',
                                            'nextPageCssClass' => 'paginate_button page-item next',
                                            'firstPageCssClass' => 'paginate_button page-item first',
                                            'lastPageCssClass' => 'paginate_button page-item last',
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
                                                'attribute' => 'customer_id',
                                                'format' => 'raw',
                                                'label' => Yii::t('backend', 'Customers'),
                                                'value' => function ($model) {
                                                    return Html::a($model->customerHasOne->name, ['/customer/customer/view', 'id' => $model->customerHasOne->id], [
                                                        'target' => '_blank',
                                                        'data-pjax' => 0,
                                                    ]);
                                                }
                                            ],
                                            [
                                                'attribute' => 'code',
                                                'label' => Yii::t('backend', 'Order'),
                                                'format' => 'raw',
                                                'value' => function ($model) {
                                                    return Html::a($model->code, ['view', 'id' => $model->id], [
                                                        'data-pjax' => 0
                                                    ]);
                                                }
                                            ],
                                            'total',
                                            'discount',
                                            //'co_so',
                                            //'ordered_at',
                                            [
                                                'attribute' => 'created_by',
                                                'value' => 'userCreated.userProfile.fullname',
                                                'headerOptions' => [
                                                    'width' => 150,
                                                ],
                                            ],
                                            [
                                                'attribute' => 'created_at',
                                                'format' => 'date',
                                                'headerOptions' => [
                                                    'width' => 150,
                                                ],
                                            ],
                                            [
                                                'class' => 'yii\grid\ActionColumn',
                                                'header' => Yii::t('backend', 'Actions'),
                                                'template' => '<div>{view} {update} {delete}</div><div class="mt-1">{payment} {list-payment}</div>',
                                                'buttons' => [
                                                    'view' => function ($url, $model) {
                                                        return Html::a('<span class="glyphicon glyphicon-search"></span>', $url, [
                                                            'title' => Yii::t('backend', 'View'),
                                                            'alia-label' => Yii::t('backend', 'View'),
                                                            'data-pjax' => 0,
                                                            'class' => 'btn btn-success btn-xs'
                                                        ]);
                                                    },
                                                    'update' => function ($url, $model) {
                                                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                            'title' => Yii::t('backend', 'Update'),
                                                            'alia-label' => Yii::t('backend', 'Update'),
                                                            'data-pjax' => 0,
                                                            'class' => 'btn btn-info btn-xs'
                                                        ]);
                                                    },
                                                    'delete' => function ($url, $model) {
                                                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', 'javascript:;', [
                                                            'title' => Yii::t('backend', 'Delete'),
                                                            'class' => 'btn btn-danger btn-xs btn-del',
                                                            'data-title' => Yii::t('backend', 'Delete?'),
                                                            'data-pjax' => 0,
                                                            'data-url' => $url,
                                                            'btn-success-class' => 'success-delete',
                                                            'btn-cancel-class' => 'cancel-delete',
                                                            'data-placement' => 'top'
                                                        ]);
                                                    },
                                                    /*
                                                     * Lịch điều trị
                                                     * 'treatment-schedule' => function ($url, $model) {
                                                        if ($model->status == CustomerOrderTable::STATUS_PUBLISHED) return null;
                                                        return Html::a('<span class="glyphicon glyphicon-plus"></span>', ['/customer/customer-treatment-schedule/create', 'order_id' => $model->id], [
                                                            'title' => Yii::t('backend', 'Create Treatment Schedule'),
                                                            'class' => 'btn btn-warning btn-xs',
                                                            'data-pjax' => 0,
                                                        ]);
                                                    },
                                                    'list-treatment-schedule' => function ($url, $model) {
                                                        return Html::a('<span class="glyphicon glyphicon-list-alt"></span>', ['/customer/customer-treatment-schedule/index', 'order_id' => $model->id], [
                                                            'title' => Yii::t('backend', 'List Treatment Schedule'),
                                                            'class' => 'btn btn-warning btn-xs',
                                                            'data-pjax' => 0,
                                                        ]);
                                                    },*/
                                                    'payment' => function ($url, $model) {
                                                        if ($model->status == CustomerOrderTable::STATUS_PUBLISHED) return null;
                                                        return Html::a('<span class="glyphicon glyphicon-plus"></span>', ['/customer/customer-payment/create', 'order_id' => $model->id], [
                                                            'title' => Yii::t('backend', 'Create Payment'),
                                                            'class' => 'btn btn-success btn-xs',
                                                            'data-pjax' => 0,
                                                        ]);
                                                    },
                                                    'list-payment' => function ($url, $model) {
                                                        return Html::a('<span class="glyphicon glyphicon-credit-card"></span>', ['/customer/customer-payment/index', 'order_id' => $model->id], [
                                                            'title' => Yii::t('backend', 'List Payment'),
                                                            'class' => 'btn btn-success btn-xs',
                                                            'data-pjax' => 0,
                                                        ]);
                                                    },
                                                ],
                                                'headerOptions' => [
                                                    'width' => 150,
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
<?php
$urlChangePageSize = \yii\helpers\Url::toRoute(['perpage']);
$script = <<< JS
var customPjax = new myGridView();
customPjax.init({
    pjaxId: '#customer-pjax',
    urlChangePageSize: '$urlChangePageSize',
});
$('body').on('click', '.success-delete', function(e){
    e.preventDefault();
    var url = $(this).attr('href') || null;
    if(url !== null){
        $.post(url);
    }
    return false;
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);