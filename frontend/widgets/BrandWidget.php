<?php


namespace frontend\widgets;


use yii\base\Widget;

class BrandWidget extends Widget
{
    public function run()
    {
        return $this->render('brandWidget',[]);
    }
}