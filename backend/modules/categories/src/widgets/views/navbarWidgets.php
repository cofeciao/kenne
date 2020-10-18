<?php
use yii\helpers\Url;
use modava\categories\CategoriesModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'categories') echo ' active' ?>"
           href="<?= Url::toRoute(['/categories/categories']); ?>">
            <i class="ion ion-ios-locate"></i><?= CategoriesModule::t('categories', 'Categories'); ?>
        </a>
    </li>
</ul>
