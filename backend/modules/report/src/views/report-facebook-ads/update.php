<?php

use modava\settings\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use modava\settings\SettingsModule;

/* @var $this yii\web\View */
/* @var $model modava\report\models\ReportFacebookAds */

$this->title = SettingsModule::t('settings', 'Update : {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => SettingsModule::t('settings', 'Report Facebook Ads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = SettingsModule::t('settings', 'Update');
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
           title="<?= SettingsModule::t('article', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= SettingsModule::t('article', 'Create'); ?></a>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </section>
        </div>
    </div>
</div>
