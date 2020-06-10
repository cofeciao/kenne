<?php

use yii\helpers\Url;
use modava\customer\CustomerModule;

$is_dev = Yii::$app->user->can('develop');
?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <?php if ($is_dev || Yii::$app->user->can('sales-online')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'sales-online') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/sales-online']); ?>" title="<?= CustomerModule::t('customer', 'Customer'); ?> (Sales Online)">
                <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('clinic')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'clinic') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/clinic']); ?>" title="<?= CustomerModule::t('customer', 'Customer'); ?> (Clinic)">
                <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-status-fail')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-status-fail') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-status-fail']); ?>">
                <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Status Fail'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-status-dong-y')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-status-dong-y') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-status-dong-y']); ?>">
                <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Status Dong Y'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-status-dat-hen')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-status-dat-hen') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-status-dat-hen']); ?>">
                <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Status Dat Hen'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-status-call')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-status-call') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-status-call']); ?>">
                <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Status Call'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-agency')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-agency') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-agency']); ?>">
                <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Agency'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-origin')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-origin') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-origin']); ?>">
                <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Origin'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-fanpage')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-fanpage') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-fanpage']); ?>">
                <i class="ion ion-ios-locate"></i><?= CustomerModule::t('customer', 'Customer Fanpage'); ?>
            </a>
        </li>
    <?php } ?>
</ul>