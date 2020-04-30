<?php

/**
 * @var $this yii\web\View
 */
?>
<?php $this->beginContent('@backend/views/layouts/common.php'); ?>
    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-vertical-nav">
        <!-- Top Navbar -->
        <?= \backend\widgets\HeaderWidget::widget(); ?>
        <!-- /Top Navbar -->
        <!-- Vertical Nav -->
        <?= \backend\widgets\VerticalNavWidget::widget(); ?>
        <!-- /Vertical Nav -->
        <!-- Setting Panel -->
        <?= \backend\widgets\SettingWidget::widget(); ?>
        <!-- /Setting Panel -->
        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Container -->
            <?php echo $content ?>
            <!-- /Container -->
            <!-- Footer -->
            <?= \backend\widgets\FooterWidget::widget(); ?>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /HK Wrapper -->
<?php $this->endContent(); ?>