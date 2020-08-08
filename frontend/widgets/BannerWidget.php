<?php


namespace frontend\widgets;


use frontend\models\Slides;
use yii\base\Widget;

class BannerWidget extends Widget
{
    public function run()
    {
        $model = new Slides();
        $data = $model->getAllBannerBig();
        return $this->render('bannerWidget',[
            'data'=>$data
        ]);
    }
}