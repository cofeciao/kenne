<?php

use modava\affiliate\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use modava\affiliate\AffiliateModule;
use modava\affiliate\helpers\Utils;

/* @var $this yii\web\View */
/* @var $model modava\affiliate\models\Customer */

$this->title = AffiliateModule::t('affiliate', 'Update : {name}', [
    'name' => $model->full_name,
]);
$this->params['breadcrumbs'][] = ['label' => AffiliateModule::t('affiliate', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AffiliateModule::t('affiliate', 'Update');

$model->birthday = Utils::convertDateToDisplayFormat($model->birthday);
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
           title="<?= AffiliateModule::t('affiliate', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= AffiliateModule::t('affiliate', 'Create'); ?></a>
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
