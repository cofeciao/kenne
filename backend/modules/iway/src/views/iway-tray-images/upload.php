<?php

use modava\iway\models\IwayTrayImages;

/* @var $this yii\web\View */
/* @var $tray modava\iway\models\IwayTray */
/* @var $model IwayTrayImages */
?>
    <div class="modal-header">
        <h5 class="modal-title" id="trap-images"><?= IwayTrayImages::TYPE[$model->type] ?></h5>
    </div>
<?= $this->render('_form', [
    'model' => $model,
]) ?>