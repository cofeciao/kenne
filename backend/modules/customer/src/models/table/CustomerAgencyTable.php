<?php

namespace modava\customer\models\table;

use modava\customer\models\query\CustomerAgencyQuery;
use Yii;

class CustomerAgencyTable extends \yii\db\ActiveRecord
{
    const STATUS_DISABLED = 0;
    const STATUS_PUBLISHED = 1;

    public static function tableName()
    {
        return 'customer_agency';
    }

    public static function find()
    {
        return new CustomerAgencyQuery(get_called_class());
    }

    public function afterDelete()
    {
        $cache = Yii::$app->cache;
        $keys = [
            'social-agency-get-by-id-' . $this->id . '-' . $this->language,
            'social-agency-get-all-agency-' . $this->language
        ];
        foreach ($keys as $key) {
            $cache->delete($key);
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        $cache = Yii::$app->cache;
        $keys = [
            'social-agency-get-by-id-' . $this->id . '-' . $this->language,
            'social-agency-get-all-agency-' . $this->language
        ];
        foreach ($keys as $key) {
            $cache->delete($key);
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function getOriginHasMany()
    {
        return $this->hasMany(CustomerOriginTable::class, ['id' => 'origin_id'])
            ->viaTable('customer_agency_origin_hasmany', ['agency_id' => 'id']);
    }

    public static function getAllAgency($lang = 'vi')
    {
        $cache = Yii::$app->cache;
        $key = 'social-agency-get-all-agency-' . $lang;
        $data = $cache->get($key);
        if ($data == false) {
            $query = self::find();
            if ($lang !== null) $query->where(['language' => $lang]);
            $data = $query->all();
        }
        return $data;
    }

    public static function getById($id = null, $lang = 'vi')
    {
        $cache = Yii::$app->cache;
        $key = 'social-agency-get-by-id-' . $id . '-' . $lang;
        $data = $cache->get($key);
        if ($data == false) {
            $query = self::find()->where(['id' => $id])->published();
            if ($lang !== null) $query->andWhere(['language' => $lang]);
            $data = $query->one();
            $cache->set($key, $data);
        }
        return $data;
    }
}
