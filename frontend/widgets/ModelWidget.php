<?php


namespace frontend\widgets;


use yii\base\Widget;

class ModelWidget extends Widget
{
    public function run()
    {
        return $this->render('modalWidget',[]);
    }
}