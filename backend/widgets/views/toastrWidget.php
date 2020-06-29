<?php

/* @var $data string */

use yii\web\View;

$script = <<< JS
/****Toastr****/
var loadToastr = function (config) {
    var defaultType = ['success', 'secondary', 'info', 'primary', 'warning', 'danger', 'light', 'dark'],
        defaultPosition = ['top-right', 'bottom-right', 'top-left', 'bottom-left'];
    config = Object.assign({
        title: null,
        text: null,
        position: Object.values(defaultPosition)[0],
        type: Object.values(defaultType)[0]
    }, config);
    if (!defaultPosition.includes(config.position)) {
        config.position = Object.values(defaultPosition)[0];
    }
    if (!defaultType.includes(config.type)) {
        config.type = Object.values(defaultType)[0];
    }
    if (typeof $.toast === "function" && (config.title !== null || config.text != null)) {
        $.toast({
            heading: config.title,
            text: config.text,
            position: config.position,
            class: 'jq-toast-'+ config.type,
            hideAfter: 3500,
            stack: 6,
            showHideTransition: 'fade'
        });
    }
}
/****Toastr****/
var toastr_config = $data;
if(toastr_config !== null && typeof loadToastr === "function"){
    loadToastr(toastr_config);
}
JS;
$this->registerJs($script, View::POS_END);
