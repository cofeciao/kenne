<?php


namespace frontend\widgets;


use frontend\models\Categories;
use yii\base\Widget;

class FooterWidget extends Widget
{
    public function run()
    {
        $data = Categories::find()->all();

        return $this->render('footerWidget',[
            'data'=>$data
        ]);
    }

}