<?php


namespace frontend\widgets;


use yii\base\Widget;

class ServiceWidget extends Widget
{
    public function run()
    {
        return $this->render('serviceWidget',[]);
    }
}