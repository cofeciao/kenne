<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\settings\widgets\NavbarWidgets;
use modava\settings\SettingsModule;

/* @var $this yii\web\View */
/* @var $model modava\report\models\ReportFacebookAds */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => SettingsModule::t('settings', 'Report Facebook Ads'), 'url' => ['index']];
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
                title="<?= SettingsModule::t('settings', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= SettingsModule::t('article', 'Create'); ?></a>
            <?= Html::a(SettingsModule::t('article', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(SettingsModule::t('article', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => SettingsModule::t('settings', 'Are you sure you want to delete this item?'),
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
                                return Yii::$app->getModule('settings')->params['status'][$model->status];
                            }
                        ],
						'created_at',
						'updated_at',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => SettingsModule::t('article', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => SettingsModule::t('article', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
