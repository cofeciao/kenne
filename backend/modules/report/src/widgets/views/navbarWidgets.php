<?php
use yii\helpers\Url;
use modava\settings\SettingsModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'report-facebook-ads') echo ' active' ?>"
           href="<?= Url::toRoute(['/settings/report-facebook-ads']); ?>">
            <i class="ion ion-ios-locate"></i><?= SettingsModule::t('settings', 'Report Facebook Ads'); ?>
        </a>
    </li>
</ul>
