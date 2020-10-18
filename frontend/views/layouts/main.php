<?php

use frontend\widgets\HeaderWidget;
use frontend\widgets\FooterWidget;
use yii\widgets\Breadcrumbs;

$this->beginContent('@frontend/views/layouts/common.php');
?>

    <div class="main-wrapper">
<?php if (Yii::$app->controller->id == 'site' && (Yii::$app->controller->action->id == 'signup' || Yii::$app->controller->action->id == 'login')){
    echo \frontend\widgets\Header2Widget::widget();
} elseif (Yii::$app->controller->id == 'site' ){
    echo HeaderWidget::widget();
} else{?>
<?= \frontend\widgets\Header2Widget::widget(); }?>
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