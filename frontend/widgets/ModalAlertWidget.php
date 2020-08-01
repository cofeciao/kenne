<?php


namespace frontend\widgets;


use yii\base\Widget;

class ModalAlertWidget extends Widget
{
        public function run()
        {
            return $this->render('modalAlertWidget',[]);
        }
}