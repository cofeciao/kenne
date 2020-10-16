
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable text-center">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Đã lưu!</h4>
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable text-center">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Lỗi!</h4>
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('successContact')): ?>
    <div class="alert alert-success alert-dismissable text-center">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4>Đã gửi thông báo đến email của bạn! &nbsp;</h4>  <i class="icon fa fa-check"></i>
        <?= Yii::$app->session->getFlash('successContact') ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('errorContact')): ?>
    <div class="alert alert-danger alert-dismissable text-center">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Lỗi!</h4>
        <?= Yii::$app->session->getFlash('errorContact') ?>
    </div>
<?php endif;?>
