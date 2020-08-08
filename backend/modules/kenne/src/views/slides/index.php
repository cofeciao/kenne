<?php

use modava\kenne\KenneModule;
use modava\kenne\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\widgets\ToastrWidget;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel modava\kenne\models\search\SlidesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = KenneModule::t('kenne', 'Slides');
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
           title="<?= KenneModule::t('kenne', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= KenneModule::t('kenne', 'Create'); ?></a>
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
                                        'firstPageLabel' => KenneModule::t('kenne', 'First'),
                                        'lastPageLabel' => KenneModule::t('kenne', 'Last'),
                                        'prevPageLabel' => KenneModule::t('kenne', 'Previous'),
                                        'nextPageLabel' => KenneModule::t('kenne', 'Next'),
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

										'sld_title',
										[
										    'attribute'=>'sld_description',
                                            'content'=>function ($data){
                                                return html_entity_decode($data->sld_description);
                                            }
                                        ],
                                        [
                                                'attribute'=>'sld_image',
                                                'format'=>'html',
                                                'content'=>function($model){
                                                    return Html::img(\yii\helpers\Url::to('/uploads/kenne/150x150/').$model->sld_image);
                                                }
                                        ],
										'sld_cat_id',
                                        [
                                            'attribute'=>'sld_type',
                                            'content'=>function($model){
                                                if($model->sld_type == 1){
                                                    return "Slide";
                                                }elseif($model->sld_type == 0){
                                                    return "Banner nhỏ";
                                                } else{
                                                    return "Banner lớn";
                                                }
                                            }
                                        ],
                                        [
                                            'attribute'=>'sld_status',
                                            'content' => function($model){
                                                if($model->sld_status == 1){
                                                    return Html::a('Kích hoạt',['/kenne/slides','update'=>$model->id, 'action'=>'update'],['class'=>'badge badge-success']);
                                                    //return '<span class="badge badge-success" style="font-size: 15px">Hiển thị</span>';
                                                }else{
                                                    return Html::a('Không kích hoạt',['/kenne/slides','update'=>$model->id, 'action'=>'update'],['class'=>'badge badge-secondary']);
                                                    //return '<span class="badge badge-secondary">Không hiển thị<pan>';
                                                }
                                            },
                                        ],
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'header' => KenneModule::t('kenne', 'Actions'),
                                            'template' => '{update} {delete}  {view}',
                                            'buttons' => [
                                                'update' => function ($url, $model) {
                                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                        'title' => KenneModule::t('kenne', 'Update'),
                                                        'alia-label' => KenneModule::t('kenne', 'Update'),
                                                        'data-pjax' => 0,
                                                        'class' => 'btn btn-info btn-xs'
                                                    ]);
                                                },
                                                'delete' => function ($url, $model) {
                                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', 'javascript:;', [
                                                        'title' => KenneModule::t('kenne', 'Delete'),
                                                        'class' => 'btn btn-danger btn-xs btn-del',
                                                        'data-title' => KenneModule::t('kenne', 'Delete?'),
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