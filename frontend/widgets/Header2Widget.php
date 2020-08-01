<?php


namespace frontend\widgets;


use frontend\models\Categories;
use yii\base\Widget;

class Header2Widget extends Widget
{
    public function run()
    {
        $data = Categories::find()->all();
        return $this->render('header2Widget',[
            'data'=>$data,
        ]);
    }
}