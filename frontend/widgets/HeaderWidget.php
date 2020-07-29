<?php
namespace frontend\widgets;


use frontend\models\Categories;

class HeaderWidget extends \yii\base\Widget
{
    public function run()
    {
        $data = Categories::find()->all();
        return $this->render('headerWidget',[
            'data'=>$data,
        ]);
    }
}