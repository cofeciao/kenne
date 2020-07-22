<?php
use yii\helpers\Url;
use modava\products\ProductsModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'products') echo ' active' ?>"
           href="<?= Url::toRoute(['/products/products']); ?>">
            <i class="ion ion-ios-locate"></i><?= ProductsModule::t('products', 'Products'); ?>
        </a>
    </li>
</ul>
