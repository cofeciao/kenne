<?php

namespace frontend\controllers;

use frontend\components\MyController;
use frontend\models\Contacts;

class ContactUsController extends MyController
{
    public function actionIndex()
    {
        return $this->render('index', []);
    }

    public function actionCreate()
    {
        $model = new Contacts();
        $data = \Yii::$app->request->post();
        $model->con_name = $data['con_name'];
        $model->con_content = $data['con_message'];
        $model->con_email = $data['con_email'];
        $model->con_subject = $data['con_subject'];
        $model->con_content = $data['con_message'];
        $body = '<b>Cảm ơn đã giử phản hồi cho chúng tôi! </b> <p><b>Nội dung: </p></b>'
            . $data['con_message']
            . '<hr><p> Chúng tôi sẽ phản hồi lại trong thời gian sớm nhất.</p>';
        if ($model->save()) {
            \Yii::$app->mailer->compose()
                ->setFrom('runhitbtn2@gmail.com')
                ->setTo($data['con_email'])
                ->setSubject($data['con_subject'])
                ->setHtmlBody($body)
                ->send();

            \Yii::$app->session->setFlash('successContact', '<b>Cảm ơn đã giử phản hồi cho chúng tôi! </b>');
        } else {
            \Yii::$app->session->setFlash('errorContact', '<b>Lỗi trong quá trình gửi vui lòng kiểm tra lại thông tin </b>');
        }
        return $this->redirect('/contact-us');

    }
}