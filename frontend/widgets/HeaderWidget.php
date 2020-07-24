<?php
namespace frontend\widgets;

class HeaderWidget extends \yii\base\Widget
{
    public function run()
    {
        return $this->render('headerWidget',[]);
    }
}