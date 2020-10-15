<?php

use backend\widgets\ToastrWidget;
use common\grid\MyGridView;
use modava\iway\helpers\Utils;
use modava\iway\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel modava\iway\models\search\AppointmentScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Lịch hẹn');
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


        <?php Pjax::begin(['id' => 'appointment-schedule-pjax', 'timeout' => false, 'enablePushState' => true, 'clientOptions' => ['method' => 'GET']]); ?>
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
                                                'template' => '{update} {delete}',
                                                'buttons' => [
                                                    'create-order' => function ($url, $model) {
                                                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                            'title' => Yii::t('backend', 'Tạo đơn hàng'),
                                                            'alia-label' => Yii::t('backend', 'Tạo đơn hàng'),
                                                            'data-pjax' => 0,
                                                            'class' => 'btn btn-info btn-xs'
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
                                                ],
                                            ],
                                            [
                                                'attribute' => 'title',
                                                'format' => 'raw',
                                                'headerOptions' => ['class' => 'header-300'],
                                                'value' => function ($model) {
                                                    $content = '<strong>Tiêu đề:</strong> ' . Html::a($model->title, ['view', 'id' => $model->id], [
                                                            'title' => $model->title,
                                                            'data-pjax' => 0,
                                                        ]) . '<br/>';
                                                    $content .= '<strong>KH:</strong> ' . $model->getDisplayRelatedField('customer_id', 'customer', 'customer', 'fullname') . ' - ' . $model->customer->code . '<br/>';
                                                    $content .= '<strong>Cơ sở:</strong> ' . $model->getDisplayRelatedField('co_so_id', 'coSo', 'co-so');

                                                    return $content;
                                                }
                                            ],
                                            [
                                                'label' => Yii::t('backend', 'Thông tin hẹn'),
                                                'headerOptions' => ['class' => 'header-300'],
                                                'format' => 'raw',
                                                'value' => function (\modava\iway\models\AppointmentSchedule $model) {
                                                    $content = '<strong>Ngày hẹn:</strong> ' . Utils::convertDateTimeToDisplayFormat($model->start_time) . '<br/>';
                                                    $content .= '<strong>Tình trạng: </strong>' . $model->getDisplayDropdown($model->status, 'status') . '<br/>';
                                                    switch ($model->status) {
                                                        case 'den';
                                                            $moreInfo = '<strong>Dịch vụ quan tâm: </strong>' . $model->getDisplayDropdown($model->accept_for_service, 'accept_for_service') . '<br/>';
                                                            $moreInfo .= '<strong>Ngày đến: </strong>' . Utils::convertDateTimeToDisplayFormat($model->check_in_time) . '<br/>';
                                                            break;
                                                        case 'doi_lich';
                                                            $moreInfo = '<strong>Lịch mới: </strong>' . $model->getDisplayRelatedField('new_appointment_schedule_id', 'newAppointmentSchedule', 'appointment-schedule') . ' (' . Utils::convertDateTimeToDisplayFormat($model->newAppointmentSchedule->start_time) . ')<br/>';
                                                            break;
                                                        default:
                                                            $moreInfo = '';
                                                            break;
                                                    }

                                                    $moreInfo .= '<strong>Ghi chú của Online: </strong>' . $model->description;
                                                    return $content . $moreInfo;
                                                }
                                            ],
                                            [
                                                'attribute' => 'status_service',
                                                'format' => 'raw',
                                                'headerOptions' => [
                                                    'class' => 'header-200',
                                                ],
                                                'value' => function ($model) {
                                                    $content = $model->getDisplayDropdown($model->status_service, 'status_service') . '<br/>';
                                                    if ($model->status_service == 'khong_dong_y_lam') {
                                                        $content .= '<strong>Lý do Fail: </strong>' . $model->getDisplayDropdown($model->reason_fail, 'reason_fail');
                                                    }
                                                    return $content;
                                                }
                                            ],
                                            [
                                                'label' => Yii::t('backend', 'Thông tin thêm'),
                                                'format' => 'raw',
                                                'headerOptions' => [
                                                    'class' => 'header-300',
                                                ],
                                                'value' => function (\modava\iway\models\AppointmentSchedule $model) {
                                                    $content = '<strong>Direct Sales: </strong> ' . ($model->direct_sales_id ? $model->directSales->userProfile->fullname : '') . '<br/>';
                                                    $content .= '<strong>Ghi Chú Direct Sales: </strong> ' . $model->direct_sales_note . '<br/>';
                                                    $content .= '<strong>Bác sĩ thăm khám: </strong> ' . ($model->doctor_thamkham_id ? $model->doctorThamkham->userProfile->fullname : '') . '<br/>';
                                                    $content .= '<strong>Ghi Chú Bác sĩ thăm khám: </strong> ' . $model->doctor_thamkham_note . '<br/>';

                                                    return $content;
                                                }
                                            ],
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
                </section>
            </div>
        </div>
        <?php Pjax::end(); ?>
    </div>
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
JS;
$this->registerJs($script, \yii\web\View::POS_END);