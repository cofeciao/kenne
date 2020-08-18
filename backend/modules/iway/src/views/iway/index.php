<?php

use modava\iway\IwayModule;
use modava\iway\widgets\NavbarWidgets;
use modava\iway\models\Customer;

$this->title = IwayModule::t('iway', 'Iway');
$this->params['breadcrumbs'][] = $this->title;

/* @var $model */
?>

<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <div class="row">
        <div class="col-12">
            <section class="hk-sec-wrapper">
                <?php
                var_dump($model->getDropdowns());
                var_dump($model->getDropdown('status'));
                ?>
            </section>
        </div>
    </div>
</div>
