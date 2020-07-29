<?php
namespace frontend\widgets;

use common\components\Component;

class MinicartWidget extends \yii\base\Widget
{
    public function run()
    {
        $total = 0;
        $data = unserialize(serialize(Component::getCookies('cart')));
        if (empty($data)){
            $data = "";
        }
        foreach ($data as $item){
            $total += $item['price'];
        }

        return $this->render('minicartWidget',[
            'data'=>$data,
            'total'=>$total
        ]);
    }
}