<?php

use frontend\widgets\HeaderWidget;
use frontend\widgets\FooterWidget;
use yii\widgets\Breadcrumbs;

$this->beginContent('@frontend/views/layouts/common.php');
?>

    <div class="main-wrapper">
<?/*= \frontend\widgets\LoadingWidget::widget()*/?>
<?= HeaderWidget::widget() ?>
<?= $content; ?>
<?php echo \frontend\widgets\BrandWidget::widget()?>
    </div>
    <!-- end main -->

<?= FooterWidget::widget()?>



<?= \frontend\widgets\ScrollWidget::widget()?>
<?= \frontend\widgets\ModalAlertWidget::widget() ?>
<?php
$this->endContent();
?>