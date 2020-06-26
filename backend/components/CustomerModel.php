<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 15-Jan-19
 * Time: 2:48 PM
 */

namespace backend\components;

use backend\modules\customer\models\Dep365CustomerOnlineFailStatus;
use backend\modules\customer\models\Dep365CustomerOnlineNguon;
use backend\modules\location\models\Province;
use backend\modules\setting\models\Dep365CoSo;
use common\models\UserProfile;
use yii\db\ActiveRecord;

class CustomerModel extends MyModel
{
    const SEX_MAN = 1;
    const SEX_WOMAN = 0;

    const STATUS_DH = 1;
    const STATUS_FAIL = 2;
    const STATUS_KBM = 3;
    const STATUS_AO = 4;

    public static function tableName()
    {
        return 'dep365_customer_online';
    }

    public static function getSex()
    {
        return [
            self::SEX_MAN => 'Nam Giới',
            self::SEX_WOMAN => 'Nữ Giới',
        ];
    }

    public function getProvinceHasOne()
    {
        return $this->hasOne(Province::class, ['id' => 'province']);
    }

    public function getNguonCustomerOnlineHasOne()
    {
        return $this->hasOne(Dep365CustomerOnlineNguon::class, ['id' => 'nguon_online']);
    }

    public function getFailStatusCustomerOnlineHasOne()
    {
        return $this->hasOne(Dep365CustomerOnlineFailStatus::class, ['id' => 'status_fail']);
    }

    public function getCoSoHasOne()
    {
        return $this->hasOne(Dep365CoSo::class, ['id' => 'co_so']);
    }


    public function getUserCreatedBy($id)
    {
        $user = UserProfile::find()->where(['user_id' => $id])->one() ?: '1';
        return $user;
    }

    public function getUserUpdatedBy($id)
    {
        $user = UserProfile::find()->where(['user_id' => $id])->one() ?: '1';
        return $user;
    }
}
