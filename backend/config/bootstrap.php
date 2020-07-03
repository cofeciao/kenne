<?php

define('VERSION', 'V1.33');
define('LOGIN_VERSION', 'v2.4');
Yii::setAlias('@moduleBackend', realpath(__DIR__ . '/../backend/modules/'));
Yii::setAlias('@api', dirname(dirname(__DIR__)) . '/../backend/modules/api');
//Yii::setAlias('modava/auth', dirname(dirname(__DIR__)) . '/backend/modules/auth/src');
Yii::setAlias('modava/contact', dirname(dirname(__DIR__)) . '/backend/modules/contact/src');
Yii::setAlias('modava/article', dirname(dirname(__DIR__)) . '/backend/modules/article/src');
Yii::setAlias('modava/product', dirname(dirname(__DIR__)) . '/backend/modules/product/src');
Yii::setAlias('modava/customer', dirname(dirname(__DIR__)) . '/backend/modules/customer/src');
Yii::setAlias('modava/social', dirname(dirname(__DIR__)) . '/backend/modules/social/src');
Yii::setAlias('modava/settings', dirname(dirname(__DIR__)) . '/backend/modules/settings/src');
Yii::setAlias('modava/marketing', dirname(dirname(__DIR__)) . '/backend/modules/marketing/src');
Yii::setAlias('modava/report', dirname(dirname(__DIR__)) . '/backend/modules/report/src');
Yii::setAlias('modava/comment', dirname(dirname(__DIR__)) . '/backend/modules/comment/src');
//Yii::setAlias('modava/location', dirname(dirname(__DIR__)) . '/backend/modules/location/src');

//Widget
Yii::setAlias('modava/tiny', dirname(dirname(__DIR__)) . '/backend/widgets/tiny/src');
Yii::setAlias('modava/imagick', dirname(dirname(__DIR__)) . '/package/imagick/src');