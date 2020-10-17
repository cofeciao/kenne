<?php

use modava\iway\widgets\NavbarWidgets;
use yii\helpers\Html;
use common\grid\MyGridView;
use backend\widgets\ToastrWidget;
use yii\widgets\Pjax;
use yii\helpers\Url;
use modava\iway\models\IwayImages;

/* @var $this yii\web\View */
/* @var $searchModel modava\iway\models\search\IwayImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Iway Tray Images');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container-fluid px-xxl-15 px-xl-10">
        <?= NavbarWidgets::widget(); ?>

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                            class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
            </h4>
            <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('backend', 'Create'), 'javascript:;', [
                'class' => 'btn btn-outline-light btn-sm btn-iway-images',
                'title' => Yii::t('backend', 'Create'),
                'data-load' => Url::toRoute(['upload', 'parent_table' => Yii::$app->request->get('parent_table'), 'parent_id' => Yii::$app->request->get('parent_id')])
            ]) ?>
        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper index">

                    <?php Pjax::begin(['id' => 'pjax-images', 'timeout' => false, 'enablePushState' => true, 'clientOptions' => ['method' => 'GET']]); ?>
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
                                                'attribute' => 'parent_table',
                                                'value' => function ($model) {
                                                    return $model->getParentName();
                                                }
                                            ],
//                                            'parent_id',
                                            [
                                                'attribute' => 'image',
                                                'format' => 'raw',
                                                'value' => function ($model) {
                                                    /* @var $model IwayImages */
                                                    $image = $model->getImage($model::getPathUploadByParentTable($model->parent_table));
                                                    if ($image == null) return null;
                                                    return Html::img($image, [
                                                        'class' => 'img-responsive',
                                                        'style' => 'max-width: 150px'
                                                    ]);
                                                },
                                                'headerOptions' => [
                                                    'width' => 170
                                                ]
                                            ],
                                            [
                                                'attribute' => 'status',
                                                'format' => 'raw',
                                                'value' => function ($model) {
                                                    /* @var $model IwayImages */
                                                    if ($model->status == IwayImages::CHUA_DANH_GIA) return 'Chưa đánh giá';
                                                    $evaluate = 'Trạng thái: <span class="btn btn-xs btn-' . ($model->status == IwayImages::DAT ? 'success' : 'warning') . '">' . IwayImages::STATUS[$model->status] . '</span>'
                                                        . '<br/>Đánh giá: ' . $model->evaluate;
                                                    $info = '';
                                                    if ($model->evaluate_at != null) {
                                                        $info .= (is_numeric($model->evaluate_at) ? date('d-m-Y H:i', $model->evaluate_at) : $model->evaluate_at);
                                                    }
                                                    if ($model->userEvaluateHasOne != null && $model->userEvaluateHasOne->userProfile) {
                                                        if ($info != '') $info .= ' - ';
                                                        $info .= $model->userEvaluateHasOne->userProfile->fullname;
                                                    }
                                                    if ($info != '') $evaluate .= '<br/>(' . $info . ')';
                                                    return $evaluate;
                                                }
                                            ],
                                            [
                                                'class' => 'yii\grid\ActionColumn',
                                                'header' => Yii::t('backend', 'Actions'),
                                                'template' => '{update} {delete}',
                                                'buttons' => [
                                                    'update' => function ($url, $model) {
                                                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', 'javascript:;', [
                                                            'title' => Yii::t('backend', 'Update'),
                                                            'alia-label' => Yii::t('backend', 'Update'),
                                                            'data-pjax' => 0,
                                                            'class' => 'btn btn-info btn-xs btn-iway-images',
                                                            'data-load' => Url::toRoute(['upload', 'parent_table' => $model->parent_table, 'parent_id' => $model->parent_id, 'type' => $model->type, 'id' => $model->id])
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
    <!-- Modal -->
    <div class="modal fade" id="modal-image" tabindex="-1" role="dialog" aria-labelledby="modal-trap-images"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

            </div>
        </div>
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