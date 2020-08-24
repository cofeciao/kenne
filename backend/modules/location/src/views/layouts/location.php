<?php
\modava\location\assets\LocationAsset::register($this);
\modava\location\assets\LocationCustomAsset::register($this);
?>
<?php $this->beginContent('@backend/views/layouts/main.php'); ?>
<?php echo $content ?>
<?php $this->endContent(); ?>
