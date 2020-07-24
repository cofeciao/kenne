<?php
/**
 * Created by PhpStorm.
 * User: Kem Bi
 * Date: 26-May-18
 * Time: 12:10 PM
 */

namespace backend\components;

use modava\auth\models\User;
use yii\web\Controller;
use Yii;

class MyController extends Controller
{
    public function init()
    {
        parent::init();
        $user = new User();
        $userRoleName = $user->getRoleName(Yii::$app->user->id);
        $this->view->params['userRoleName'] = $userRoleName;
    }

    public function behaviors()
    {
        return parent::behaviors(); // TODO: Change the autogenerated stub
    }

    public function goBack($defaultUrl = null)
    {
        return Yii::$app->getResponse()->redirect(Yii::$app->getUser()->getReturnUrl($defaultUrl));
    }
}
