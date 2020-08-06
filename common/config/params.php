<?php
/**
 * Created by PhpStorm.
 * User: Kem Bi
 * Date: 04-Jun-18
 * Time: 10:37 AM
 */

return \yii\helpers\ArrayHelper::merge(
    [
        'availableLocales' => [
            'vi' => 'Tiếng Việt',
            'en' => 'English',
            'jp' => 'Japan',
        ],
        'adminEmail' => ADMIN_EMAIL,
        'robotEmail' => ROBOT_EMAIL,
        'webAdmin' => WEB_ADMIN,

    ],
    require __DIR__ . '/configparams.php'
);