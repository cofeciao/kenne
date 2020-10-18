<?php


namespace frontend\widgets;


use yii\base\Widget;

class ScrollWidget extends Widget
{
    public function run()
    {
        return $this->render('scrollWidget',[]);
    }
}