<?php
\modava\contact\assets\ContactAsset::register($this);
\modava\contact\assets\ContactCustomAsset::register($this);
?>
<?php $this->beginContent('@backend/views/layouts/main.php'); ?>
<?php echo $content ?>
<?php $this->endContent(); ?>
