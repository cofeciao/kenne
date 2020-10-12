<?php

use modava\iway\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use modava\iway\models\form\FormTrayImages;

/* @var $this yii\web\View */
/* @var $tray modava\iway\models\IwayTray */
/* @var $model FormTrayImages */
/* @var $tray_image modava\iway\models\IwayTrayImages */
?>
    <div class="modal-header">
        <h5 class="modal-title" id="trap-images"><?= FormTrayImages::TYPE[$model->type] ?></h5>
    </div>
<?= $this->render('_form', [
    'tray' => $tray,
    'model' => $model,
    'tray_image' => $tray_image,
]) ?>