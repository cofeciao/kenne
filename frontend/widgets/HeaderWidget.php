<?php
namespace frontend\widgets;


use common\models\CategoriesCommon;

class HeaderWidget extends \yii\base\Widget
{
    public function run()
    {
        $data = CategoriesCommon::find()->all();
        return $this->render('headerWidget',[
            'data'=>$data,
        ]);
    }
}