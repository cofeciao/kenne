<?php
use yii\helpers\Url;
use modava\kenne\KenneModule;

?>

<ul class="nav nav-tabs nav-sm nav-light mb-25">

    <?php if (Yii::$app->controller->id == 'blogs'){?>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'blogs') echo ' active' ?>"
           href="<?= Url::toRoute(['/kenne/blogs']); ?>">
            <i class="ion ion-ios-locate"></i><?= KenneModule::t('kenne', 'blogs'); ?>
        </a>
    </li>

    <?php } elseif (Yii::$app->controller->id == 'categories'){?>
        <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'categories') echo ' active' ?>"
           href="<?= Url::toRoute(['/kenne/categories']); ?>">
            <i class="ion ion-ios-locate"></i><?= KenneModule::t('kenne', 'Categories'); ?>
        </a>
    </li>

    <?php } elseif (Yii::$app->controller->id == 'products'){?>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'products') echo ' active' ?>"
           href="<?= Url::toRoute(['/kenne/products']); ?>">
            <i class="ion ion-ios-locate"></i><?= KenneModule::t('kenne', 'Products'); ?>
        </a>
    </li>

    <?php } elseif (Yii::$app->controller->id == 'transactions'){?>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'transactions') echo ' active' ?>"
           href="<?= Url::toRoute(['/kenne/transactions']); ?>">
            <i class="ion ion-ios-locate"></i><?= KenneModule::t('kenne', 'Transactions'); ?>
        </a>
    </li>

    <?php } elseif (Yii::$app->controller->id == 'subcribes'){?>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'subcribes') echo ' active' ?>"
           href="<?= Url::toRoute(['/kenne/subcribes']); ?>">
            <i class="ion ion-ios-locate"></i><?= KenneModule::t('kenne', 'Subcribes'); ?>
        </a>
    </li>

    <?php } elseif (Yii::$app->controller->id == 'slides'){?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'slides') echo ' active' ?>"
               href="<?= Url::toRoute(['/kenne/slides']); ?>">
                <i class="ion ion-ios-locate"></i><?= KenneModule::t('kenne', 'Slides'); ?>
            </a>
        </li>

    <?php } else {?>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'orders') echo ' active' ?>"
           href="<?= Url::toRoute(['/kenne/orders']); ?>">
            <i class="ion ion-ios-locate"></i><?= KenneModule::t('kenne', 'Orders'); ?>
        </a>
    </li>
    <?php } ?>



</ul>
