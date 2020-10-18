<?php

use yii\helpers\Html;

$this->title = Yii::t('backend', 'File manager');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid px-xxl-25 px-xl-10">

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
    </div>
    <!-- /Title -->
    <div class="row">
        <div class="col-xl-12">
            <iframe src="<?= $link; ?>/dialog.php?lang=vi&akey=<?= $filemanager_access_key; ?>"
                    style="width: 100%; height: 900px;"></iframe>
        </div>
    </div>

</div>
