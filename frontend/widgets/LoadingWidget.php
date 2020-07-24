<?php


namespace frontend\widgets;


use yii\base\Widget;

class LoadingWidget extends Widget
{
 public function run()
 {
    return $this->render('loadingWidget',[]);
 }
}