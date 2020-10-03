<?php

use backend\widgets\ToastrWidget;
use common\grid\MyGridView;
use modava\iway\widgets\JsUtils;
use modava\iway\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel modava\iway\models\search\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Customers');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container-fluid px-xxl-15 px-xl-10">
        <?= NavbarWidgets::widget(); ?>

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                            class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
            </h4>
            <a class="btn btn-outline-light btn-sm" href="<?= \yii\helpers\Url::to(['create']); ?>"
               title="<?= Yii::t('backend', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= Yii::t('backend', 'Create'); ?>        </a>
        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper index">

                    <?php Pjax::begin(['id' => 'dt-pjax', 'timeout' => false, 'enablePushState' => true, 'clientOptions' => ['method' => 'GET']]); ?>
                    <?= ToastrWidget::widget(['key' => 'toastr-' . $searchModel->toastr_key .
                        '-index']) ?>
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
                                            Yii::$app->controller->renderPartial('@backend/views/layouts/my-gridview/_pageTo',
                                                [
                                                    'totalPage' => $totalPage,
                                                    'currentPage' =>
                                                        Yii::$app->request->get($dataProvider->getPagination()->pageParam)
                                                ]) .
                                            Yii::$app->controller->renderPartial('@backend/views/layouts/my-gridview/_pageSize')
                                            .
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
                                                'class' => 'pagination pull-left',
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
                                                'class' => 'yii\grid\ActionColumn',
                                                'header' => Yii::t('backend', 'Actions'),
                                                'template' => '{create-call} {create-lich-hen} {update} {delete}',
                                                'buttons' => [
                                                    'create-call' => function ($url, $model) {
                                                        return Html::a('<i class="icon dripicons-phone"></i>' . ' ' . Yii::t('backend', 'Tạo cuộc gọi'), 'javascript:;', [
                                                            'title' => Yii::t('backend', 'Tạo cuộc gọi'),
                                                            'alia-label' => Yii::t('backend', 'Tạo cuộc gọi'),
                                                            'data-pjax' => 0,
                                                            'data-partner' => 'myaris',
                                                            'class' => 'btn btn-success btn-xs create-call m-1'
                                                        ]);
                                                    },
                                                    'create-lich-hen' => function ($url, $model) {
                                                        return Html::a('<i class="icon dripicons-to-do"></i>' . ' ' . Yii::t('backend', 'Tạo lịch hẹn'), 'javascript:;', [
                                                            'title' => Yii::t('backend', 'Tạo lịch hẹn'),
                                                            'alia-label' => Yii::t('backend', 'Tạo lịch hẹn'),
                                                            'data-pjax' => 0,
                                                            'data-partner' => 'myaris',
                                                            'class' => 'btn btn-success btn-xs create-lich-hen m-1'
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
                                                    }
                                                ],
                                                'headerOptions' => [
                                                    'width' => 150,
                                                    'class' => 'text-center'
                                                ],
                                                'contentOptions' => [
                                                    'width' => 150,
                                                    'class' => 'text-center'
                                                ],
                                            ],
                                            [
                                                'attribute' => 'fullname',
                                                'format' => 'raw',
                                                'value' => function ($model) {
                                                    return Html::a($model->fullname, ['view', 'id' => $model->id], [
                                                        'title' => $model->fullname,
                                                        'data-pjax' => 0,
                                                    ]);
                                                }
                                            ],
                                            'code',
                                            'avatar',
                                            [
                                                'attribute' => 'phone',
                                                'format' => 'raw',
                                                'value' => function ($model) {
                                                    return $model->getPhone();
                                                }
                                            ],
                                            [
                                                'attribute' => 'sex',
                                                'value' => function ($model) {
                                                    return $model->getDisplayDropdown($model->sex, 'sex');
                                                }
                                            ],
                                            //'birthday',
                                            //'address',
                                            //'province_id',
                                            //'district_id',
                                            //'ward_id',
                                            //'online_source',
                                            //'fb_fanpage',
                                            //'fb_customer',
                                            //'online_sales_id',
                                            //'online_sales_note:ntext',
                                            //'direct_sales_id',
                                            //'direct_sales_note:ntext',
                                            //'status_customer',
                                            //'co_so_id',
                                            //'reason_fail',
                                            //'who_created',
                                            //'description:ntext',
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

<?= JsUtils::widget() ?>

<?php
$urlChangePageSize = \yii\helpers\Url::toRoute(['perpage']);
$script = <<< JS
$('body').on('click', '.success-delete', function(e){
e.preventDefault();
var url = $(this).attr('href') || null;
if(url !== null){
$.post(url);
}
return false;
});
var customPjax = new myGridView();
customPjax.init({
pjaxId: '#dt-pjax',
urlChangePageSize: '$urlChangePageSize',
});

$('body').on('click', '.create-call',function() {
    let customerId = $(this).closest('tr').data('key');
    openCreateModal({model: 'Call', 
        'Call[customer_id]' : customerId,
    });
}).on('click', '.create-lich-hen',function() {
    let customerId = $(this).closest('tr').data('key');
    openCreateModal({model: 'AppointmentSchedule', 
        'AppointmentSchedule[customer_id]' : customerId,
    });
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);