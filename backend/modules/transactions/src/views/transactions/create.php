<?php

use modava\transactions\widgets\NavbarWidgets;
use yii\helpers\Html;
use modava\transactions\TransactionsModule;


/* @var $this yii\web\View */
/* @var $model modava\transactions\models\Transactions */

$this->title = TransactionsModule::t('transactions', 'Create');
$this->params['breadcrumbs'][] = ['label' => TransactionsModule::t('transactions', 'Transactions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
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
