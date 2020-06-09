<?php

namespace modava\customer\models\table;

use cheatsheet\Time;
use modava\customer\models\query\CustomerFanpageQuery;
use Yii;
use yii\db\ActiveRecord;

class CustomerFanpageTable extends \yii\db\ActiveRecord
{
    const STATUS_DISABLED = 0;
    const STATUS_PUBLISHED = 1;

    public static function tableName()
    {
        return 'customer_fanpage';
    }

    public static function find()
    {
        return new CustomerFanpageQuery(get_called_class());
    }

    public function getOriginHasOne()
    {
        return $this->hasOne(CustomerOriginTable::class, ['id' => 'origin_id']);
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
