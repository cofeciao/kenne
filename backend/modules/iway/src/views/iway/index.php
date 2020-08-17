<?php

use modava\iway\IwayModule;
use modava\iway\widgets\NavbarWidgets;

$this->title = IwayModule::t('iway', 'Iway');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>
</div>