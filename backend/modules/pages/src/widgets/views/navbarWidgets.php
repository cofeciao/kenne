<?php

use modava\pages\PagesModule;
use yii\helpers\Url;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-10">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'document') echo ' active' ?>"
           href="<?= Url::toRoute(['/pages/document']); ?>">
            <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Document'); ?>
        </a>
    </li>
<<<<<<< HEAD
=======
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'partner') echo ' active' ?>"
           href="<?= Url::toRoute(['/pages/partner']); ?>">
            <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Partner'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'project') echo ' active' ?>"
           href="<?= Url::toRoute(['/pages/project']); ?>">
            <i class="ion ion-ios-locate"></i><?= Yii::t('backend', 'Project'); ?>
        </a>
    </li>
>>>>>>> master
</ul>
