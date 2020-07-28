<?php
$domain = ((
        (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ||
        (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on')
    ) ? "https" : "http") . "://" . @$_SERVER['HTTP_HOST'];


/**
 * Setting path aliases
 */
Yii::setAlias('@base', realpath(__DIR__ . '/../../'));
Yii::setAlias('@common', realpath(__DIR__ . '/../../common'));
Yii::setAlias('@frontend', realpath(__DIR__ . '/../../frontend'));
Yii::setAlias('@backend', realpath(__DIR__ . '/../../backend'));
Yii::setAlias('@console', realpath(__DIR__ . '/../../console'));
Yii::setAlias('@web', realpath(__DIR__ . '/../../web'));
Yii::setAlias('@frontendUrl', $domain . '/');
Yii::setAlias('@backendUrl', $domain . '/backend/');

//Config package
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
Yii::setAlias('modava/website', dirname(dirname(__DIR__)) . '/backend/modules/website/src');
Yii::setAlias('modava/calendar', dirname(dirname(__DIR__)) . '/backend/modules/calendar/src');
Yii::setAlias('modava/filemanager', dirname(dirname(__DIR__)) . '/backend/modules/filemanager/src');
Yii::setAlias('modava/log', dirname(dirname(__DIR__)) . '/backend/modules/log/src');
Yii::setAlias('modava/iway', dirname(dirname(__DIR__)) . '/backend/modules/iway/src');
Yii::setAlias('modava/affiliate', dirname(dirname(__DIR__)) . '/backend/modules/affiliate/src');
Yii::setAlias('modava/pages', dirname(dirname(__DIR__)) . '/backend/modules/pages/src');
Yii::setAlias('modava/voip24h', dirname(dirname(__DIR__)) . '/backend/widgets/voip24h/src');
//Yii::setAlias('modava/location', dirname(dirname(__DIR__)) . '/backend/modules/location/src');

//Widget
Yii::setAlias('modava/tiny', dirname(dirname(__DIR__)) . '/backend/widgets/tiny/src');
Yii::setAlias('modava/select2', dirname(dirname(__DIR__)) . '/common/widgets/select2/src');
Yii::setAlias('modava/imagick', dirname(dirname(__DIR__)) . '/package/imagick/src');
Yii::setAlias('modava/giaohang', dirname(dirname(__DIR__)) . '/package/giaohang/src');


Yii::setAlias('modava/generators', dirname(dirname(__DIR__)) . '/backend/modava/src/generators');
