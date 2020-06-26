<?php
/* @var $generator yii\gii\generators\model\Generator */
?>
<?= "<?php" ?>

use modava\<?= $generator->moduleID ?>\components\MyErrorHandler;

$config = [
    'defaultRoute' => '<?= $generator->moduleID ?>/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@<?= $generator->moduleID ?>web' => '@modava/<?= $generator->moduleID ?>/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
