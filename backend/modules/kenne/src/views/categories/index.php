<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\widgets\ToastrWidget;
use yii\widgets\Pjax;
use modava\kenne\widgets\NavbarWidgets;
use modava\kenne\KenneModule;

/* @var $this yii\web\View */
/* @var $searchModel modava\categories\models\search\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = KenneModule::t('categories', 'Categories');
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
            <a class="btn btn-outline-light" href="<?= \yii\helpers\Url::to(['create']); ?>"
               title="<?= KenneModule::t('categories', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= KenneModule::t('categories', 'Create'); ?></a>
        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">

                    <?php Pjax::begin(); ?>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="dataTables_wrapper dt-bootstrap4">
                                    <?= GridView::widget([
                                        'dataProvider' => $dataProvider,
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
                                            'firstPageLabel' => KenneModule::t('categories', 'First'),
                                            'lastPageLabel' => KenneModule::t('categories', 'Last'),
                                            'prevPageLabel' => KenneModule::t('categories', 'Previous'),
                                            'nextPageLabel' => KenneModule::t('categories', 'Next'),
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
                                                'label' => 'Loại sản phẩm',
                                                'attribute' => 'cat_name',
                                            ],
                                            [
                                                'label' => 'Trạng thái',
                                                'attribute' => 'cat_status',
                                                'content' => function($model){
                                                    if($model->cat_status == 1){
                                                        return Html::a('Hiển thị',['/kenne/categories','update'=>$model->id, 'action'=>'update'],['class'=>'badge badge-success']);
                                                        //return '<span class="badge badge-success" style="font-size: 15px">Hiển thị</span>';
                                                    }else{
                                                        return Html::a('Không hiển thị',['/kenne/categories','update'=>$model->id, 'action'=>'update'],['class'=>'badge badge-secondary']);
                                                        //return '<span class="badge badge-secondary">Không hiển thị<pan>';
                                                    }
                                                }
                                            ],
                                            [
                                                'class' => 'yii\grid\ActionColumn',
                                                'header' => KenneModule::t('categories', 'Actions'),
                                                'template' => '{update} {delete} {view}',
                                                'buttons' => [
                                                    'update' => function ($url, $model) {
                                                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                            'title' => KenneModule::t('categories', 'Update'),
                                                            'alia-label' => KenneModule::t('categories', 'Update'),
                                                            'data-pjax' => 0,
                                                            'class' => 'btn btn-info btn-xs'
                                                        ]);
                                                    },

                                                    'delete' => function ($url, $model) {
                                                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', 'javascript:;', [
                                                            'title' => KenneModule::t('categories', 'Delete'),
                                                            'class' => 'btn btn-danger btn-xs btn-del',
                                                            'data-title' => KenneModule::t('categories', 'Delete?'),
                                                            'data-pjax' => 0,
                                                            'data-url' => $url,
                                                            'btn-success-class' => 'success-delete',
                                                            'btn-cancel-class' => 'cancel-delete',
                                                            'data-placement' => 'top'
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
$script = <<< JS
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