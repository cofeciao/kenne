<?php
/**
 * Created by PhpStorm.
 * User: mongd
 * Date: 14-Aug-18
 * Time: 10:27 PM
 */

namespace backend\modules\user\rbac;

use backend\modules\user\models\User;
use yii\rbac\Rule;
use backend\modules\dataauris\models\Dep365DataaurisCustomer;

class DataAurisCustomerRule extends Rule
{
    public $name = 'userOwnDataAurisCustomer';

    public function execute($user, $item, $params)
    {
        if (isset($params['model'])) {
            $model = $params['model'];
        } else {
            $id = \Yii::$app->request->get('id');
            $model = Dep365DataaurisCustomer::findOne($id);
        }

        $userLogin = new User();
        $userRole = $userLogin->getRoleName(\Yii::$app->user->id);

        if ($model && $userRole == User::USER_LE_TAN) {
            return $model->permission_user == $user;
        }

        return true;
    }
}
