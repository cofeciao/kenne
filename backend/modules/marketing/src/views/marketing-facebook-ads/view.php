<?php

use backend\widgets\ToastrWidget;
use modava\marketing\MarketingModule;
use modava\marketing\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model modava\marketing\models\MarketingFacebookAds */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => MarketingModule::t('marketing', 'Marketing Facebook Ads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-view']) ?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <p>
            <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
               title="<?= MarketingModule::t('marketing', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= MarketingModule::t('article', 'Create'); ?></a>
            <?= Html::a(MarketingModule::t('article', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(MarketingModule::t('article', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => MarketingModule::t('marketing', 'Are you sure you want to delete this item?'),
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
                        'id',
                        'don_vi',
                        'so_tien_chay',
                        'hien_thi',
                        'tiep_can',
                        'binh_luan',
                        'tin_nhan',
                        'page_chay',
                        'location_id',
                        'san_pham',
                        'tuong_tac',
                        'so_dien_thoai',
                        'goi_duoc',
                        'lich_hen',
                        'khach_den',
                        'ngay_chay',
                        'money_hienthi',
                        'money_tiepcan',
                        'money_binhluan',
                        'money_tinnhan',
                        'money_tuongtac',
                        'money_sodienthoai',
                        'money_goiduoc',
                        'money_lichhen',
                        'money_khachden',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Yii::$app->getModule('marketing')->params['status'][$model->status];
                            }
                        ],
                        'created_at',
                        'updated_at',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => MarketingModule::t('article', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => MarketingModule::t('article', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
