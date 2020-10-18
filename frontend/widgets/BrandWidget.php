<?php


namespace frontend\widgets;


use frontend\models\Logo;
use yii\base\Widget;

class BrandWidget extends Widget
{
    public function run()
    {
        $model = new Logo();
        $logo = $model->getAllLogo();

        return $this->render('brandWidget',[
            'logo' => $logo
        ]);
    }
}