<?php

use modava\marketing\MarketingModule;
use yii\helpers\Url;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-10">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'marketing-facebook-ads') echo ' active' ?>"
           href="<?= Url::toRoute(['/marketing/marketing-facebook-ads']); ?>">
            <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Marketing Facebook Ads'); ?>
        </a>
    </li>
</ul>
