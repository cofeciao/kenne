<?php

use backend\widgets\ToastrWidget;
use common\grid\MyGridView;
use modava\iway\widgets\DropdownWidget;
use modava\iway\widgets\JsUtils;
use modava\iway\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
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

        <?php Pjax::begin(['id' => 'customer-index-pjax', 'options' => ['class' => 'pjax-container'], 'timeout' => false, 'enablePushState' => true, 'clientOptions' => ['method' => 'GET']]); ?>
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <?= $this->render('_search', ['model' => $searchModel]); ?>
                <section class="hk-sec-wrapper index">
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
                                                'class' => 'yii\grid\ActionColumn',
                                                'header' => Yii::t('backend', 'Actions'),
                                                'template' => DropdownWidget::widget([
                                                    'title' => Yii::t('backend', 'Hành động'),
                                                    'isCustomItem' => true,
                                                    'options' => [
                                                        'class' => 'btn-info btn-sm'
                                                    ],
                                                    'dropdowns' => [
                                                        '{create-call}',
                                                        '{create-lich-hen}',
                                                        '{list-lich-hen}',
                                                        '{list-call}',
                                                        '{update}',
                                                        '{delete}',
                                                    ]]),
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
                                                    'list-lich-hen' => function ($url, $model) {
                                                        return Html::a('<i class="icon dripicons-to-do"></i>' . ' ' . Yii::t('backend', 'DS Lịch hẹn'), Url::toRoute(['appointment-schedule/index', 'AppointmentScheduleSearch[customer_id]' => $model->primaryKey]), [
                                                            'title' => Yii::t('backend', 'DS Lịch hẹn'),
                                                            'alia-label' => Yii::t('backend', 'DS Lịch hẹn'),
                                                            'data-pjax' => 0,
                                                            'class' => 'btn btn-info btn-xs m-1',
                                                            'target' => '_blank'
                                                        ]);
                                                    },
                                                    'list-call' => function ($url, $model) {
                                                        return Html::a('<i class="icon dripicons-phone"></i>' . ' ' . Yii::t('backend', 'DS Cuộc gọi'), Url::toRoute(['call/index', 'CallSearch[customer_id]' => $model->primaryKey]), [
                                                            'title' => Yii::t('backend', 'DS Cuộc gọi'),
                                                            'alia-label' => Yii::t('backend', 'DS Cuộc gọi'),
                                                            'data-pjax' => 0,
                                                            'class' => 'btn btn-info btn-xs m-1',
                                                            'target' => '_blank'
                                                        ]);
                                                    },
                                                    'update' => function ($url, $model) {
                                                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>' . ' ' . Yii::t('backend', 'Update'), $url, [
                                                            'title' => Yii::t('backend', 'Update'),
                                                            'alia-label' => Yii::t('backend', 'Update'),
                                                            'data-pjax' => 0,
                                                            'class' => 'btn btn-info btn-xs m-1'
                                                        ]);
                                                    },
                                                    'delete' => function ($url, $model) {
                                                        return Html::a('<span class="glyphicon glyphicon-trash"></span>' . ' ' . Yii::t('backend', 'Delete'), 'javascript:;', [
                                                            'title' => Yii::t('backend', 'Delete'),
                                                            'class' => 'btn btn-danger btn-xs btn-del m-1',
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
                                                'label' => Yii::t('backend', 'Thông tin'),
                                                'format' => 'raw',
                                                'value' => function (\modava\iway\models\Customer $model) {
                                                    $content = Html::a($model->fullname, ['view', 'id' => $model->id], ['title' => $model->fullname, 'data-pjax' => 0,]);
                                                    $content .= $model->sex ? ' (' . $model->getDisplayDropdown($model->sex, 'sex') . ')' : '';
                                                    $content .= ' - <strong>' . $model->code . ' </strong>' . $model->getPhone() . '<br/>';
                                                    $content .= '<i class="font-italic">Tạo bởi: ' . $model->userCreated->userProfile->fullname . ' (' . Yii::$app->formatter->asDatetime($model->created_at) . ')</i><br/>';
                                                    $content .= '<i class="font-italic">Sales Online: ' . $model->onlineSales->userProfile->fullname . '</i><br/>';
                                                    $content .= '<i class="font-italic">Cơ sở hiện tại: ' . $model->getDisplayRelatedField('co_so_id', 'coSo', 'co-so') . '</i><br/>';
                                                    return $content;
                                                },
                                                'headerOptions' => [
                                                    'class' => 'header-300'
                                                ]
                                            ],
                                            [
                                                'attribute' => 'status_customer',
                                                'format' => 'raw',
                                                'value' => function (\modava\iway\models\Customer $model) {
                                                    $class = '';
                                                    $moreInfo = '';
                                                    switch ($model->status_customer) {
                                                        case 'dat_hen':
                                                            $class = 'badge-success';
                                                            break;
                                                        case 'cho_cham_soc_lai':
                                                            $class = 'badge-primary';
                                                            break;
                                                        case 'fail':
                                                            $class = 'badge-danger';
                                                            $moreInfo = 'Lý do: ' . $model->reason_fail;
                                                            break;
                                                    };
                                                    $content = Html::tag('span', $model->getDisplayDropdown($model->status_customer, 'status_customer'), [
                                                            'class' => 'font-14 badge ' . $class
                                                        ]) . '<br>';
                                                    return $content . $moreInfo;
                                                }
                                            ],
                                            [
                                                'attribute' => 'description',
                                                'format' => 'raw',
                                                'headerOptions' => ['class' => 'header-200']
                                            ],
                                            [
                                                'attribute' => 'online_sales_note',
                                                'format' => 'raw',
                                                'headerOptions' => ['class' => 'header-200']
                                            ],
                                            [
                                                'attribute' => 'online_source',
                                                'format' => 'raw',
                                                'headerOptions' => [
                                                    'class' => 'header-200'
                                                ],
                                                'contentOptions' => [
                                                    'class' => 'text-center'
                                                ],
                                                'value' => function (\modava\iway\models\Customer $model) {
                                                    $moreInfo = '';
                                                    if ($model->online_source === 'facebook') {
                                                        $moreInfo .= '<br/>';
                                                        $moreInfo .= '<span class="text-primary">' . $model->getDisplayDropdown($model->fb_fanpage, 'fb_fanpage') . '</span>';
                                                        if ($model->fb_customer) {
                                                            $moreInfo .= '<br/>';
                                                            $moreInfo .= 'FB KH: ' . $model->fb_customer;
                                                        }
                                                    }
                                                    return $model->getDisplayDropdown($model->online_source, 'online_source') . $moreInfo;
                                                }
                                            ],
                                        ],
                                    ]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php Pjax::end(); ?>
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