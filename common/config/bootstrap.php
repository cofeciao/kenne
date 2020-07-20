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
