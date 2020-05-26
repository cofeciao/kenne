<?php
/* @var $generator yii\gii\generators\model\Generator */
?>
<?= "<?php" ?>

\modava\<?= $generator->moduleID ?>\assets\<?= ucfirst($generator->moduleID) ?>Asset::register($this);
?>
<?= "<?php" ?> $this->beginContent('@backend/views/layouts/main.php'); ?>
<?= "<?php" ?> echo $content ?>
<?= "<?php" ?> $this->endContent(); ?>
