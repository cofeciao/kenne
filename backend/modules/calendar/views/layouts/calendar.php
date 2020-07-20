<?php
/**
 * @var $this yii\web\View
 */
\backend\modules\calendar\assets\CalendarAsset::register($this);
?>

<?php $this->beginContent('@backend/views/layouts/main.php'); ?>
<?php echo $content ?>
<?php $this->endContent(); ?>
