<?php
namespace modava\iway\widgets;

class JsUtils extends \yii\base\Widget
{
    public $formClassName;
    public $modelName;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('jsUtils', [
            'formClassName' => $this->formClassName,
            'modelName' => $this->modelName,
        ]);
    }
}