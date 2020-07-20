<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use modava\website\widgets\NavbarWidgets;
use modava\website\WebsiteModule;

/* @var $this yii\web\View */
/* @var $model modava\website\models\KeyValue */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => WebsiteModule::t('website', 'Key value'), 'url' => ['index']];
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
               title="<?= WebsiteModule::t('website', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= WebsiteModule::t('website', 'Create'); ?></a>
            <?= Html::a(WebsiteModule::t('website', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(WebsiteModule::t('website', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => WebsiteModule::t('website', 'Are you sure you want to delete this item?'),
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
                        'title',
                        'key',
                        'value',
                        [
                            'attribute' => 'language',
                            'value' => function ($model) {
                                if ($model->language == '')
                                    return null;
                                return Yii::$app->getModule('website')->params['availableLocales'][$model->language];
                            },
                        ],
                        'created_at:date',
                        'updated_at:date',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => WebsiteModule::t('website', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => WebsiteModule::t('website', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
