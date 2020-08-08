<?php


namespace frontend\widgets;


use frontend\models\Slides;
use yii\base\Widget;

class BannerTopWidget extends Widget
{
    public function run()
    {
        $model = new Slides();
        $data = $model->getAllBannerTop();
        return $this->render('bannerTopWidget',[
            'data'=>$data
        ]);
    }
}