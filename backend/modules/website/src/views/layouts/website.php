<?php
\modava\website\assets\WebsiteAsset::register($this);
\modava\website\assets\WebsiteCustomAsset::register($this);
?>
<?php $this->beginContent('@backend/views/layouts/main.php'); ?>
<?php echo $content ?>
<?php $this->endContent(); ?>
