<?php
use yii\helpers\Url;
use modava\affiliate\AffiliateModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'coupon-type') echo ' active' ?>"
           href="<?= Url::toRoute(['/affiliate/coupon-type']); ?>">
            <i class="ion ion-ios-locate"></i><?= AffiliateModule::t('affiliate', 'Coupon Type'); ?>
        </a>
    </li>
</ul>
