<?php

use yii\widgets\Breadcrumbs;

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
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <?php
                echo Breadcrumbs::widget([
                    'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
                    'activeItemTemplate' => '<li class="breadcrumb-item active" aria-current="page">{link}</li>',
                    'tag' => 'ol',
                    'homeLink' => [
                        'label' => Yii::t('yii', 'Home'),
                        'url' => Yii::$app->homeUrl,
                    ],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'options' => [
                        'class' => 'breadcrumb breadcrumb-light bg-transparent'
                    ]
                ])
                ?>
            </nav>
            <!-- /Breadcrumb -->
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