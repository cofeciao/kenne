<?php

use modava\video\VideoModule;
use modava\video\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\widgets\ToastrWidget;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel modava\video\models\search\VideoTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = VideoModule::t('video', 'Video Types');
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
           title="<?= VideoModule::t('video', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= VideoModule::t('video', 'Create'); ?></a>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">

                <?php Pjax::begin(); ?>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="dataTables_wrapper dt-bootstrap4 table-responsive">
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
                                        'firstPageLabel' => VideoModule::t('video', 'First'),
                                        'lastPageLabel' => VideoModule::t('video', 'Last'),
                                        'prevPageLabel' => VideoModule::t('video', 'Previous'),
                                        'nextPageLabel' => VideoModule::t('video', 'Next'),
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
                                            'attribute' => 'title',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return Html::a($model->title, ['view', 'id' => $model->id], [
                                                    'title' => $model->title,
                                                    'data-pjax' => 0,
                                                ]);
                                            }
                                        ],

                                        [
                                            'attribute' => 'image',
                                            'format' => 'html',
                                            'value' => function ($model) {
                                                if ($model->image == null) {
                                                    return Html::img('/uploads/video-type/150x150/no-image.png', ['width' => 150, 'height' => 150]);
                                                }
                                                return Html::img(Yii::$app->params['video-type']['150x150']['folder'] . $model->image);
                                            },
                                            'headerOptions' => [
                                                'width' => 150,
                                            ],
                                        ],
										'description:html',
//										'position',
										//'ads_session:ntext',
                                        [
                                            'attribute' => 'language',
                                            'value' => function ($model) {
                                                return Yii::$app->params['availableLocales'][$model->language];
                                            },
                                            'headerOptions' => [
                                                'width' => 150,
                                            ],
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
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'header' => VideoModule::t('video', 'Actions'),
                                            'template' => '{update} {delete}',
                                            'buttons' => [
                                                'update' => function ($url, $model) {
                                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                        'title' => VideoModule::t('video', 'Update'),
                                                        'alia-label' => VideoModule::t('video', 'Update'),
                                                        'data-pjax' => 0,
                                                        'class' => 'btn btn-info btn-xs'
                                                    ]);
                                                },
                                                'delete' => function ($url, $model) {
                                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', 'javascript:;', [
                                                        'title' => VideoModule::t('video', 'Delete'),
                                                        'class' => 'btn btn-danger btn-xs btn-del',
                                                        'data-title' => VideoModule::t('video', 'Delete?'),
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