<?php

namespace modava\customer\models\table;

use backend\modules\user\models\User;
use cheatsheet\Time;
use modava\customer\CustomerModule;
use modava\location\models\table\LocationWardTable;
use modava\settings\models\table\SettingCoSoTable;
use Yii;
use yii\db\ActiveRecord;

class CustomerTable extends \yii\db\ActiveRecord
{
    const TYPE_ONLINE = 1;
    const TYPE_DIRECT = 2;
    const TYPE = [
        self::TYPE_ONLINE => 'Online',
        self::TYPE_DIRECT => 'Direct'
    ];
    const SEX_WOMEN = 0;
    const SEX_MEN = 1;
    const SEX = [
        self::SEX_WOMEN => 'Nữ',
        self::SEX_MEN => 'Nam'
    ];

    public static function tableName()
    {
        return 'customer';
    }



    public function getWardHasOne()
    {
        return $this->hasOne(LocationWardTable::class, ['id' => 'ward']);
    }

    public function fanpageHasOne()
    {
        return $this->hasOne(CustomerFanpageTable::class, ['id' => 'fanpage_id']);
    }

    public function getPermissionUserHasOne()
    {
        return $this->hasOne(User::class, ['id' => 'permission_user']);
    }

    public function getStatusCallHasOne()
    {
        return $this->hasOne(CustomerStatusCallTable::class, ['id' => 'status_call']);
    }

    public function getStatusFailHasOne()
    {
        return $this->hasOne(CustomerStatusFailTable::class, ['id' => 'status_fail']);
    }

    public function getStatusDatHenHasOne()
    {
        return $this->hasOne(CustomerStatusDatHenTable::class, ['id' => 'status_dat_hen']);
    }

    public function getStatusDongYHasOne()
    {
        return $this->hasOne(CustomerStatusDongYTable::class, ['id' => 'status_dong_y']);
    }

    public function getCoSoHasOne()
    {
        return $this->hasOne(SettingCoSoTable::class, ['id' => 'co_so']);
    }

    public function afterDelete()
    {
        $cache = Yii::$app->cache;
        $keys = [];
        foreach ($keys as $key) {
            $cache->delete($key);
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        $cache = Yii::$app->cache;
        $keys = [];
        foreach ($keys as $key) {
            $cache->delete($key);
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
}
