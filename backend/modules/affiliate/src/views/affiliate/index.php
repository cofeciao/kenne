<?php

use modava\affiliate\AffiliateModule;
use modava\affiliate\widgets\NavbarWidgets;

$this->title = 'Affiliate';
$this->title = AffiliateModule::t('affiliate', 'Affiliate');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid px-xxl-25 px-xl-10">
<?= NavbarWidgets::widget(); ?>
</div>
