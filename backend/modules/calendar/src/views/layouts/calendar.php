<?php
\modava\calendar\assets\CalendarAsset::register($this);
\modava\calendar\assets\MyCalendarAsset::register($this);
?>
<?php $this->beginContent('@backend/views/layouts/main.php'); ?>
<?php echo $content ?>
<?php $this->endContent(); ?>
