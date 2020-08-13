<?php
\modava\slide\assets\SlideAsset::register($this);
\modava\slide\assets\SlideCustomAsset::register($this);
?>
<?php $this->beginContent('@backend/views/layouts/main.php'); ?>
<?php echo $content ?>
<?php $this->endContent(); ?>
