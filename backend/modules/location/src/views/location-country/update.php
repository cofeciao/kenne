<?php

use yii\helpers\Html;
use yii\helpers\Url;
use modava\app\AppModule;

/* @var $this yii\web\View */
/* @var $model modava\location\models\LocationCountry */

$this->title = AppModule::t('app', 'Update : {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => AppModule::t('app', 'Location Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppModule::t('app', 'Update');
?>
<div class="container-fluid px-xxl-25 px-xl-10">

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
           title="<?= AppModule::t('article', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= AppModule::t('article', 'Create'); ?></a>
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
