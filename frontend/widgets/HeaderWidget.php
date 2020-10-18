<?php
namespace frontend\widgets;


use common\components\Component;
use frontend\models\Categories;

class HeaderWidget extends \yii\base\Widget
{
    public function run()
    {
        $data = Categories::find()->all();
        
        $cookies  = unserialize(serialize(Component::getCookies('cart')));
        if (empty($cookies)){
            $total = 0;
        }else{
            $total = count($cookies);
        }

        return $this->render('headerWidget',[
            'data'=>$data,
            'total'=>$total
        ]);
    }


}