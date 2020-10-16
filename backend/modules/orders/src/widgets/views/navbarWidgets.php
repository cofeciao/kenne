<?php
use yii\helpers\Url;
use modava\orders\OrdersModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'orders') echo ' active' ?>"
           href="<?= Url::toRoute(['/orders/orders']); ?>">
            <i class="ion ion-ios-locate"></i><?= OrdersModule::t('orders', 'Orders'); ?>
        </a>
    </li>
</ul>
