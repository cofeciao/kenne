<?php

use modava\iway\widgets\NavbarWidgets;
use yii\helpers\Html;
use modava\iway\IwayModule;


/* @var $this yii\web\View */
/* @var $model modava\iway\models\Product */

$this->title = IwayModule::t('iway', 'Create');
$this->params['breadcrumbs'][] = ['label' => IwayModule::t('iway', 'Products'), 'url' => ['index']];
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
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
