<?php
/* @var $generator yii\gii\generators\model\Generator */
$ns = explode('\\', $generator->moduleClass)[0];
?>
<?= "<?php" ?>

\<?= $ns ?>\<?= $generator->moduleID ?>\assets\<?= ucfirst($generator->moduleID) ?>Asset::register($this);
<<<<<<< HEAD
=======
\<?= $ns ?>\<?= $generator->moduleID ?>\assets\<?= ucfirst($generator->moduleID) ?>CustomAsset::register($this);
>>>>>>> master
?>
<?= "<?php" ?> $this->beginContent('@backend/views/layouts/main.php'); ?>
<?= "<?php" ?> echo $content ?>
<?= "<?php" ?> $this->endContent(); ?>
