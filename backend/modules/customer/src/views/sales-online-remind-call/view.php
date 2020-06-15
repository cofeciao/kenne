<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\customer\widgets\NavbarWidgets;
use modava\customer\CustomerModule;

/* @var $this yii\web\View */
/* @var $model modava\customer\models\Customer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => CustomerModule::t('customer', 'Customers'), 'url' => ['index']];
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
                title="<?= CustomerModule::t('customer', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= CustomerModule::t('article', 'Create'); ?></a>
            <?= Html::a(CustomerModule::t('article', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(CustomerModule::t('article', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => CustomerModule::t('customer', 'Are you sure you want to delete this item?'),
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
						'code',
						'name',
						'birthday',
						'sex',
						'phone',
						'address',
						'ward',
						'avatar',
						'fanpage_id',
						'permission_user',
						'type',
						'status_call',
						'status_fail',
						'status_dat_hen',
						'status_dong_y',
						'time_lich_hen:datetime',
						'time_come:datetime',
						'direct_sale',
						'co_so',
						'sale_online_note',
						'direct_sale_note',
						'created_at',
						'updated_at',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => CustomerModule::t('article', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => CustomerModule::t('article', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
