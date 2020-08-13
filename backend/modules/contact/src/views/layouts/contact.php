<?php
\modava\contact\assets\ContactAsset::register($this);
<<<<<<< HEAD
\modava\contact\assets\ContactCustomAsset::register($this);
=======
\modava\contact\assets\MyContactAsset::register($this);
>>>>>>> master
?>
<?php $this->beginContent('@backend/views/layouts/main.php'); ?>
<?php echo $content ?>
<?php $this->endContent(); ?>
