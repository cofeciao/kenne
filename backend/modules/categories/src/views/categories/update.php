<?php

use modava\categories\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use modava\categories\CategoriesModule;

/* @var $this yii\web\View */
/* @var $model modava\categories\models\Categories */

$this->title = CategoriesModule::t('categories', 'Update : {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => CategoriesModule::t('categories', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = CategoriesModule::t('categories', 'Update');
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
           title="<?= CategoriesModule::t('categories', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= CategoriesModule::t('categories', 'Create'); ?></a>
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
