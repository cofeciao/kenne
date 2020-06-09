<?php
use yii\helpers\Url;
use modava\settings\SettingsModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'setting-co-so') echo ' active' ?>"
           href="<?= Url::toRoute(['/settings/setting-co-so']); ?>">
            <i class="ion ion-ios-locate"></i><?= SettingsModule::t('settings', 'Setting Co So'); ?>
        </a>
    </li>
</ul>
