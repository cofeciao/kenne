<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\location\widgets\NavbarWidgets;
use modava\location\LocationModule;

/* @var $this yii\web\View */
/* @var $model modava\location\models\LocationWard */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => LocationModule::t('location', 'Country'), 'url' => ['/location']];
$this->params['breadcrumbs'][] = ['label' => LocationModule::t('location', 'Ward'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-view']) ?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <p>
            <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
               title="<?= LocationModule::t('location', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= LocationModule::t('location', 'Create'); ?></a>
            <?= Html::a(LocationModule::t('location', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(LocationModule::t('location', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => LocationModule::t('location', 'Are you sure you want to delete this item?'),
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
                        'name',
                        'slug',
                        'Type',
                        'LatiLongTude',
                        [
                            'attribute' => 'districtHasOne.provinceHasOne.countryHasOne.CommonName',
                            'label' => 'Quốc gia'
                        ],
                        [
                            'attribute' => 'districtHasOne.provinceHasOne.name',
                            'label' => 'Tỉnh/Thành phố'
                        ],
                        [
                            'attribute' => 'districtHasOne.name',
                            'label' => 'Quận/Huyện'
                        ],
                        'SortOrder',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Yii::$app->getModule('location')->params['status'][$model->status];
                            }
                        ],
                        [
                            'attribute' => 'language',
                            'value' => function ($model) {
                                return Yii::$app->getModule('location')->params['availableLocales'][$model->language];
                            },
                        ],
                        'IsDeleted',
                        'created_at:datetime',
                        'updated_at:datetime',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => LocationModule::t('location', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => LocationModule::t('location', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
