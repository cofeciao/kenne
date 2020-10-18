<?php


namespace frontend\controllers;


use frontend\components\MyController;
use frontend\models\Subcribes;

class NewsLetterController extends MyController
{
    public function actionSubcribe(){
        $data = \Yii::$app->request->post();
        $model = new Subcribes();
        $model->sub_email = $data['emailSubcribe'];
        /*$subject = "Đăng kí NewsLetter thành công";
        $body = '<b>Cảm ơn đã đăng kí </b> '
            . '<hr><p> Chúng tôi sẽ luôn cập nhật thông tin khuyến mãi cũng như sản phẩm cho bạn sớm nhất.</p>';
        if ($model->save()) {
            \Yii::$app->mailer->compose()
                ->setFrom('runhitbtn2@gmail.com')
                ->setTo($data['emailSubcribe'])
                ->setSubject($subject)
                ->setHtmlBody($body)
                ->send();*/
        $query = $model->getSubcribeByEmail($data['emailSubcribe']);
        if($query->count() >= 1){
            return "fail";
        }else{
            $model->save();
            return 'success';
        }
    }
}