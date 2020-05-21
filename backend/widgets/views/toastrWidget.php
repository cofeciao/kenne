<?php

/* @var $data string */

use yii\web\View;

$script = <<< JS
var toastr_config = $data;
if(toastr_config !== null && typeof loadToastr === "function"){
    loadToastr(toastr_config);
}
JS;
$this->registerJs($script, View::POS_END);
