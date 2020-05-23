<?php
/* @var $generator yii\gii\generators\model\Generator */
?>
<?= "<?php" ?>

\modava\<?= $generator->messageCategory ?>\assets\<?= ucfirst($generator->messageCategory) ?>Asset::register($this);
?>
<?= "<?php" ?> $this->beginContent('@backend/views/layouts/main.php'); ?>
<?= "<?php" ?> echo $content ?>
<?= "<?php" ?> $this->endContent(); ?>
