<?php
use yii\helpers\Url;
use modava\social\SocialModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'social-agency') echo ' active' ?>"
           href="<?= Url::toRoute(['/social/social-agency']); ?>">
            <i class="ion ion-ios-locate"></i><?= SocialModule::t('social', 'Social Agency'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'social-origin') echo ' active' ?>"
           href="<?= Url::toRoute(['/social/social-origin']); ?>">
            <i class="ion ion-ios-locate"></i><?= SocialModule::t('social', 'Social Origin'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'social-fanpage') echo ' active' ?>"
           href="<?= Url::toRoute(['/social/social-fanpage']); ?>">
            <i class="ion ion-ios-locate"></i><?= SocialModule::t('social', 'Social Fanpage'); ?>
        </a>
    </li>
</ul>
