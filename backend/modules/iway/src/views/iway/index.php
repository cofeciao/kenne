<?php
use modava\iway\IwayModule;
use modava\iway\widgets\NavbarWidgets;
use modava\iway\models\Customer;

$this->title = Yii::t('backend', 'Iway');
$this->params['breadcrumbs'][] = $this->title;

/* @var $model */
?>

<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <div class="row">
        <div class="col-12">
            <section class="hk-sec-wrapper">
                <?php
               /* var_dump($model->getDropdowns());
                var_dump($model->getDropdown('status'));*/
                var_dump($model->getAllTables());
                ?>
            </section>
        </div>
    </div>
</div>
