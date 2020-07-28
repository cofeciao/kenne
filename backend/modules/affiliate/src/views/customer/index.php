<?php

use modava\affiliate\AffiliateModule;
use modava\affiliate\widgets\NavbarWidgets;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = AffiliateModule::t('affiliate', 'Customer');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid px-xxl-25 px-xl-10">
<?= NavbarWidgets::widget(); ?>

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
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
                                        'firstPageLabel' => AffiliateModule::t('affiliate', 'First'),
                                        'lastPageLabel' => AffiliateModule::t('affiliate', 'Last'),
                                        'prevPageLabel' => AffiliateModule::t('affiliate', 'Previous'),
                                        'nextPageLabel' => AffiliateModule::t('affiliate', 'Next'),
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
                                        'full_name',
                                        'phone',
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'header' => AffiliateModule::t('affiliate', 'Actions'),
                                            'template' => '{create-coupon}',
                                            'buttons' => [
                                                'create-coupon' => function ($url, $model) {
                                                    return Html::a('<i class="icon dripicons-ticket"></i>', 'javascript:;', [
                                                        'title' => AffiliateModule::t('affiliate', 'Create Coupon'),
                                                        'alia-label' => AffiliateModule::t('affiliate', 'Create Coupon'),
                                                        'data-pjax' => 0,
                                                        'class' => 'btn btn-info btn-xs'
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
            </section>
        </div>
    </div>
</div>
