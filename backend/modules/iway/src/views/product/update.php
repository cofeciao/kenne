<?php

use modava\iway\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use modava\iway\IwayModule;

/* @var $this yii\web\View */
/* @var $model modava\iway\models\Product */

$this->title = IwayModule::t('iway', 'Update : {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => IwayModule::t('iway', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = IwayModule::t('iway', 'Update');
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
           title="<?= IwayModule::t('iway', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= IwayModule::t('iway', 'Create'); ?></a>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
