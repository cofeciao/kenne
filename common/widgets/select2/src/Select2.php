<?php

namespace modava\select2;

use modava\select2\assets\Select2Asset;
use kartik\base\InputWidget;
use yii\helpers\Html;

class Select2 extends InputWidget
{
    public $model;

    public $attribute;

    public $data;

    public $options = [];

    public $label = null;

    public function run()
    {
        parent::run();
        $options = [];
        foreach ($this->options as $key => $value) {
            if ($key == 'class') {
                $options[$key] = $value . ' form-control select2';
            } else {
                $options[$key] = $value;
            }
        }
        if (empty($options['class'])) {
            $options['class'] = 'form-control select2';
        }
        echo Html::beginTag('div', ['class' => 'form-group']);
        if ($this->label == null && $this->label !== false)
            echo Html::activeLabel($this->model, $this->attribute);
        else if ($this->label !== false)
            echo '<label class="control-label" for="locationdistrict-countryid">' . $this->label . '</label>';

        echo Html::activeDropDownList($this->model, $this->attribute, $this->data, $options);
        echo Html::error($this->model, $this->attribute, ['class' => 'help-block help-block-error']);
        echo Html::endTag('div');

        $view = $this->getView();
        Select2Asset::register($view);

        $options = $this->renderSelect2();
        $view->registerJs(implode("\n", $options));
    }

    public function renderSelect2()
    {
        return ["$('.select2').select2();"];
    }
}
