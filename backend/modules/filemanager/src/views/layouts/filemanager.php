<?php
\modava\filemanager\assets\FilemanagerAsset::register($this);
\modava\filemanager\assets\MyFilemanagerAsset::register($this);
?>
<?php $this->beginContent('@backend/views/layouts/main.php'); ?>
<?php echo $content ?>
<?php $this->endContent(); ?>
