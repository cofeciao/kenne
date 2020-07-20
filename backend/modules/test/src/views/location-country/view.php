<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\test\widgets\NavbarWidgets;
use modava\test\TestModule;

/* @var $this yii\web\View */
/* @var $model modava\test\models\LocationCountry */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => TestModule::t('test', 'Location Countries'), 'url' => ['index']];
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
                title="<?= TestModule::t('test', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= TestModule::t('test', 'Create'); ?></a>
            <?= Html::a(TestModule::t('test', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(TestModule::t('test', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => TestModule::t('test', 'Are you sure you want to delete this item?'),
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
						'CountryCode',
						'CommonName',
						'slug',
						'FormalName',
						'CountryType',
						'CountrySubType',
						'Sovereignty',
						'Capital',
						'CurrencyCode',
						'CurrencyName',
						'TelephoneCode',
						'CountryCode3',
						'CountryNumber',
						'InternetCountryCode',
						'SortOrder',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Yii::$app->getModule('test')->params['status'][$model->status];
                            }
                        ],
                        [
                            'attribute' => 'language',
                            'value' => function ($model) {
                                return Yii::$app->getModule('test')->params['availableLocales'][$model->language];
                            },
                        ],
						'Flags',
						'IsDeleted',
						'created_at',
						'updated_at',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => TestModule::t('test', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => TestModule::t('test', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
