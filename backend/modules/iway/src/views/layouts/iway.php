<?php
\modava\iway\assets\IwayAsset::register($this);
\modava\iway\assets\IwayCustomAsset::register($this);
?>
<?php $this->beginContent('@backend/views/layouts/main.php'); ?>
<?php echo $content ?>
<?php $this->endContent(); ?>
