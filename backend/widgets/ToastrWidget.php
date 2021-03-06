<?php

namespace backend\widgets;

class ToastrWidget extends \yii\base\Widget
{
    public $key;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        if ($this->key == null || !\Yii::$app->session->hasFlash($this->key)) return null;
        $data = json_encode(\Yii::$app->session->getFlash($this->key));
        if ($data == null) return null;
        return $this->render('toastrWidget', [
            'data' => $data
        ]);
    }
}
