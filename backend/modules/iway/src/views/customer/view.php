<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\iway\widgets\NavbarWidgets;
use modava\iway\IwayModule;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Customer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => IwayModule::t('iway', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-view']) ?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= IwayModule::t('iway', 'Chi tiết'); ?>
            : <?= Html::encode($this->title) ?>
        </h4>
        <p>
            <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
               title="<?= IwayModule::t('iway', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= IwayModule::t('iway', 'Create'); ?></a>
            <?= Html::a(IwayModule::t('iway', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(IwayModule::t('iway', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => IwayModule::t('iway', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'name',
                        'code',
                        'birthday:date',
                        [
                            'attribute' => 'sex',
                            'value' => function ($model) {
                                return $model->getDisplayDropdown($model->sex, 'sex');
                            }
                        ],
                        'phone',
                        [
                            'attribute' => 'country_id',
                            'value' => function ($model) {
                                return $model->country_id ? $model->country->CommonName : null;
                            }
                        ],
                        [
                            'attribute' => 'province_id',
                            'value' => function ($model) {
                                return $model->province_id ? $model->province->name : null;
                            }
                        ],
                        [
                            'attribute' => 'district_id',
                            'value' => function ($model) {
                                return $model->district_id ? $model->district->name : null;
                            }
                        ],
                        [
                            'attribute' => 'ward_id',
                            'value' => function ($model) {
                                return $model->ward_id ? $model->ward->name : null;
                            }
                        ],
                        'address',
                        'avatar',
                        [
                            'attribute' => 'fanpage_id',
                            'value' => function ($model) {
                                if ($model->fanpage_id) {
                                    return $model->fanpage->name;
                                }
                                return '';
                            }
                        ],
                        [
                            'attribute' => 'type',
                            'value' => function ($model) {
                                return $model->getDisplayDropdown($model->type, 'type');
                            }
                        ],
                        [
                            'attribute' => 'online_sales_id',
                            'value' => function ($model) {
                                if ($model->online_sales_id) {
                                    return $model->onlineSale->fullname;
                                }
                                return '';
                            }
                        ],
                        'sale_online_note:raw',
                        [
                            'attribute' => 'direct_sale_id',
                            'value' => function ($model) {
                                if ($model->direct_sale_id) {
                                    return $model->directSale->fullname;
                                }
                                return '';
                            }
                        ],
                        'direct_sale_note:raw',
                        [
                            'attribute' => 'co_so',
                            'value' => function ($model) {
                                if ($model->co_so) {
                                    return $model->coSo->name;
                                }
                                return '';
                            }
                        ],
                        'created_at:datetime',
                        'updated_at:datetime',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => IwayModule::t('iway', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => IwayModule::t('iway', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
