<?php

use modava\products\ProductsModule;
use modava\products\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\widgets\ToastrWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel modava\products\models\search\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ProductsModule::t('products', 'Products');
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
               title="<?= ProductsModule::t('products', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= ProductsModule::t('products', 'Create'); ?></a>
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
                                            'firstPageLabel' => ProductsModule::t('products', 'First'),
                                            'lastPageLabel' => ProductsModule::t('products', 'Last'),
                                            'prevPageLabel' => ProductsModule::t('products', 'Previous'),
                                            'nextPageLabel' => ProductsModule::t('products', 'Next'),
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
                                                'attribute' => 'pro_name',
                                                'label' => 'Tên SP'
                                            ],
                                            [
                                                'attribute' => 'pro_slug',
                                                'label' => 'Slug'
                                            ],
                                            [
                                                'attribute' => 'pro_description',
                                                'label' => 'Mô tả',
                                                'content'=>function($model){
                                                    return html_entity_decode($model->pro_description);
                                                }
                                            ],
                                            [
                                                'attribute' => 'pro_quantity',
                                                'label' => 'Số lượng'
                                            ],
                                            [
                                                'attribute' => 'pro_price',
                                                'label' => 'Giá'
                                            ],
                                            [
                                                'attribute' => 'pro_image',
                                                'label' => 'Hình ảnh',
                                                'content'=>function($model){
                                                    return Html::img($model->pro_image,['width'=>'100px','height'=>'100px']);
                                                }
                                            ],
                                            [
                                                'attribute' => 'pro_status',
                                                'content'=>function($model){
                                                    if($model->pro_status == 1){
                                                        return '<span class="badge badge-success">Kích hoạt</span>';
                                                    }else{
                                                        return '<span class="badge badge-secondary">Chưa kích hoạt</span>';
                                                    }
                                                },
                                                'label' => 'Trạng thái',

                                            ],
                                            [
                                                'attribute' => 'pro_sale',
                                                'label' => 'Khuyến mãi'
                                            ],
                                            [
                                                'class' => 'yii\grid\ActionColumn',
                                                'header' => ProductsModule::t('products', 'Actions'),
                                                'template' => '{update} {delete}{view}',
                                                'buttons' => [
                                                    'update' => function ($url, $model) {
                                                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                            'title' => ProductsModule::t('products', 'Update'),
                                                            'alia-label' => ProductsModule::t('products', 'Update'),
                                                            'data-pjax' => 0,
                                                            'class' => 'btn btn-info btn-xs'
                                                        ]);
                                                    },
                                                    'delete' => function ($url, $model) {
                                                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', 'javascript:;', [
                                                            'title' => ProductsModule::t('products', 'Delete'),
                                                            'class' => 'btn btn-danger btn-xs btn-del',
                                                            'data-title' => ProductsModule::t('products', 'Delete?'),
                                                            'data-pjax' => 0,
                                                            'data-url' => $url,
                                                            'btn-success-class' => 'success-delete',
                                                            'btn-cancel-class' => 'cancel-delete',
                                                            'data-placement' => 'top'
                                                        ]);
                                                    },
                                                    'view' => function ($url, $model) {
                                                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                            'title' => ProductsModule::t('products', 'View'),
                                                            'alia-label' => ProductsModule::t('products', 'View'),
                                                            'data-pjax' => 0,
                                                            'class' => 'btn btn-info btn-xs'
                                                        ]);
                                                    },
                                                ],
                                                'headerOptions' => [
                                                    'width' => 200,
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