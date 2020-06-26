<?php

use yii\helpers\Url;

?>
<div class="hk-footer-wrap container-fluid px-xxl-65 px-xl-20">
    <footer class="footer">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <p>Pampered by<a href="https://hencework.com/" class="text-dark" target="_blank">Modava</a> ©
                    <?= date('Y'); ?></p>
            </div>
            <div class="col-md-6 col-sm-12">
                <p class="d-inline-block"><?= Yii::t('backend', 'Follow us'); ?></p>
                <a href="<?= Url::to('https://www.facebook.com/kembi86/'); ?>" target="_blank"
                   class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span
                            class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                <a href="<?= Url::to('https://twitter.com/kembi1986'); ?>" target="_blank"
                   class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span
                            class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
            </div>
        </div>
    </footer>
</div>
