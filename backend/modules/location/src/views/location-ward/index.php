<?php

use modava\location\LocationModule;
use modava\location\widgets\NavbarWidgets;
use yii\helpers\Html;
use common\grid\MyGridView;
use backend\widgets\ToastrWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel modava\location\models\search\LocationWardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = LocationModule::t('location', 'Ward');
$this->params['breadcrumbs'][] = ['label' => LocationModule::t('location', 'Country'), 'url' => ['/location']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php ToastrWidget::widget(['key' => 'toastr-' . $searchModel->toastr_key . '-index']) ?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <a class="btn btn-outline-light btn-sm" href="<?= \yii\helpers\Url::to(['create']); ?>"
           title="<?= LocationModule::t('location', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= LocationModule::t('location', 'Create'); ?></a>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <?php Pjax::begin(['id' => 'location-pjax', 'timeout' => false, 'enablePushState' => true, 'clientOptions' => ['method' => 'GET']]); ?>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="dataTables_wrapper dt-bootstrap4">
                                <?= MyGridView::widget([
                                    'id' => 'location-ward',
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
                                        'firstPageLabel' => LocationModule::t('location', 'First'),
                                        'lastPageLabel' => LocationModule::t('location', 'Last'),
                                        'prevPageLabel' => LocationModule::t('location', 'Previous'),
                                        'nextPageLabel' => LocationModule::t('location', 'Next'),
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
                                        'name',
                                        'Type',
                                        'LatiLongTude',
                                        [
                                            'attribute' => 'districtHasOne.name',
                                            'label' => 'Quận/Huyện'
                                        ],
                                        'SortOrder',
                                        'language',
                                        //'IsDeleted',
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
                                            'header' => LocationModule::t('location', 'Actions'),
                                            'headerOptions' => [
                                                'width' => 130,
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
    pjaxId: '#location-pjax',
    urlChangePageSize: '$urlChangePageSize',
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);
?>
