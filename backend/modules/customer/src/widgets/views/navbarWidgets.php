<?php

use yii\helpers\Url;
use modava\customer\CustomerModule;
use modava\customer\models\search\RemindCallSearch;
use modava\auth\models\User;

$is_dev = Yii::$app->user->can(User::DEV);
?>
<ul class="nav nav-tabs nav-sm nav-light mb-10">
    <?php if ($is_dev ||
        Yii::$app->user->can('customer') ||
        Yii::$app->user->can('customerCustomer') ||
        Yii::$app->user->can('customerCustomerIndex') ||
        Yii::$app->user->can('customerCustomerView')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer']); ?>"
               title="<?= Yii::t('backend', 'Customers'); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Customers'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev ||
        Yii::$app->user->can('customer') ||
        Yii::$app->user->can('customerRemind-call') ||
        Yii::$app->user->can('customerRemind-callIndex') ||
        Yii::$app->user->can('customerRemind-callView')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'remind-call') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/remind-call']); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Remind Call'); ?>
                <div class="badge badge-danger badge-pill"><?= RemindCallSearch::getSalesOnlineRemindCall(isset($this->params['userRoleName']) && !in_array($this->params['userRoleName'], ['sales_online']) ? Yii::$app->user->id : null) ?></div>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev ||
        Yii::$app->user->can('customer') ||
        Yii::$app->user->can('customerCustomer-order') ||
        Yii::$app->user->can('customerCustomer-orderIndex') ||
        Yii::$app->user->can('customerCustomer-orderView')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-order') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-order']); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Customer Order'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev ||
        Yii::$app->user->can('customer') ||
        Yii::$app->user->can('customerCustomer-payment') ||
        Yii::$app->user->can('customerCustomer-paymentIndex') ||
        Yii::$app->user->can('customerCustomer-paymentView')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-payment') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-payment']); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Customer Payment'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-treatment-schedule')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-treatment-schedule') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-treatment-schedule']); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Customer Treatment Schedule'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-status-fail')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-status-fail') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-status-fail']); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Customer Status Fail'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-status-dong-y')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-status-dong-y') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-status-dong-y']); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Customer Status Dong Y'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-status-dat-hen')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-status-dat-hen') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-status-dat-hen']); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Customer Status Dat Hen'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-status-call')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-status-call') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-status-call']); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Customer Status Call'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-agency')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-agency') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-agency']); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Customer Agency'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-origin')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-origin') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-origin']); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Customer Origin'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-fanpage')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-fanpage') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-fanpage']); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Customer Fanpage'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-co-so')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-co-so') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-co-so']); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Customer Co So'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-product-category')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-product-category') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-product-category']); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Customer Product Category'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if ($is_dev || Yii::$app->user->can('customer-product')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'customer-product') echo ' active' ?>"
               href="<?= Url::toRoute(['/customer/customer-product']); ?>">
                <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Customer Product'); ?>
            </a>
        </li>
    <?php } ?>
</ul>
