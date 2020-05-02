<?php

namespace modava\tiny;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class TinyMce extends InputWidget
{
    public $type = 'desc';
    private $clientOptions = [

    ];

    private $clientOptionsFull = [
        'plugins' => [
            "code print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern help"
        ],
        'toolbar' => "undo redo | formatselect | bold italic strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | link image | code",
        'content_css' => [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ],
        'external_filemanager_path' => "filemanager/",
        'filemanager_title' => "Responsive Filemanager",
        'external_plugins' => [
            "responsivefilemanager" => "../../tinymce/plugins/responsivefilemanager/plugin.min.js",
            "filemanager" => "../../filemanager/plugin.min.js"
        ]
    ];

    public $triggerSaveOnBeforeValidateForm = true;

    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textarea($this->name, $this->value, $this->options);
        }
        $this->registerClientScript();
    }

    protected function registerClientScript()
    {
        $js = [];
        $view = $this->getView();

        TinyMceAsset::register($view);

        $id = $this->options['id'];

        $this->clientOptions['selector'] = "#$id";
        $options = $this->clientOptions;

        if ($this->type == 'content') {
            $this->clientOptionsFull['selector'] = "#$id";
            $options = $this->clientOptionsFull;
        }

        $options = Json::encode($options);

        $js[] = "tinymce.init($options);";
        if ($this->triggerSaveOnBeforeValidateForm) {
            $js[] = "$('#{$id}').parents('form').on('beforeValidate', function() { tinymce.triggerSave(); });";
        }
        $view->registerJs(implode("\n", $js));
    }
}
