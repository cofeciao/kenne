<?php


namespace frontend\widgets;


use frontend\models\Slides;
use yii\base\Widget;

class SliderWidget extends Widget
{
    public function run()
    {
        $model = new Slides();
        $data =$model->getAllSlides();

        return $this->render('sliderWidget',[
            'data'=>$data,
        ]);
    }
}