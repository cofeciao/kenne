<?php

use modava\orders\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use modava\orders\OrdersModule;

/* @var $this yii\web\View */
/* @var $model modava\orders\models\Orders */

$this->title = OrdersModule::t('orders', 'Update : {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => OrdersModule::t('orders', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = OrdersModule::t('orders', 'Update');
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
           title="<?= OrdersModule::t('orders', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= OrdersModule::t('orders', 'Create'); ?></a>
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
