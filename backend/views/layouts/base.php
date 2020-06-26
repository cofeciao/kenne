<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="57x57"
          href="<?= Yii::$app->assetManager->publish('@backendWeb/ico/apple-icon-57x57.png')[1]; ?>">
    <link rel="apple-touch-icon" sizes="60x60"
          href="<?= Yii::$app->assetManager->publish('@backendWeb/ico/apple-icon-60x60.png')[1]; ?>">
    <link rel="apple-touch-icon" sizes="72x72"
          href="<?= Yii::$app->assetManager->publish('@backendWeb/ico/apple-icon-72x72.png')[1]; ?>">
    <link rel="apple-touch-icon" sizes="76x76"
          href="<?= Yii::$app->assetManager->publish('@backendWeb/ico/apple-icon-76x76.png')[1]; ?>">
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?= Yii::$app->assetManager->publish('@backendWeb/ico/apple-icon-114x114.png')[1]; ?>">
    <link rel="apple-touch-icon" sizes="120x120"
          href="<?= Yii::$app->assetManager->publish('@backendWeb/ico/apple-icon-120x120.png')[1]; ?>">
    <link rel="apple-touch-icon" sizes="144x144"
          href="<?= Yii::$app->assetManager->publish('@backendWeb/ico/apple-icon-144x144.png')[1]; ?>">
    <link rel="apple-touch-icon" sizes="152x152"
          href="<?= Yii::$app->assetManager->publish('@backendWeb/ico/apple-icon-152x152.png')[1]; ?>">
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?= Yii::$app->assetManager->publish('@backendWeb/ico/apple-icon-180x180.png')[1]; ?>">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?= Yii::$app->assetManager->publish('@backendWeb/ico/android-icon-192x192.png')[1]; ?>">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?= Yii::$app->assetManager->publish('@backendWeb/ico/favicon-32x32.png')[1]; ?>">
    <link rel="icon" type="image/png" sizes="96x96"
          href="<?= Yii::$app->assetManager->publish('@backendWeb/ico/favicon-96x96.png')[1]; ?>">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?= Yii::$app->assetManager->publish('@backendWeb/ico/favicon-16x16.png')[1]; ?>">
    <link rel="manifest" href="<?= Yii::$app->assetManager->publish('@backendWeb/ico/manifest.json')[1]; ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
          content="<?= Yii::$app->assetManager->publish('@backendWeb/ico/ms-icon-144x144.png')[1]; ?>">
    <meta name="theme-color" content="#ffffff">

    <?php echo Html::csrfMetaTags() ?>
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--    Loading Start-->
<?php echo $content ?>
<!--    Show modal of create or update modules-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
