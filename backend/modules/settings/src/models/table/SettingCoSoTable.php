<?php

namespace modava\settings\models\table;

use cheatsheet\Time;
use modava\settings\models\query\SettingCoSoQuery;
use Yii;
use yii\db\ActiveRecord;

class SettingCoSoTable extends \yii\db\ActiveRecord
{
    const STATUS_DISABLED = 0;
    const STATUS_PUBLISHED = 1;

    public static function tableName()
    {
        return 'setting_co_so';
    }

    public static function find()
    {
        return new SettingCoSoQuery(get_called_class());
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

    public static function getAllCoSo($language = null)
    {
        $language = $language ?: Yii::$app->language;
        $cache = Yii::$app->cache;
        $key = 'redis-settings-co-so-get-all-co-so-' . $language;
        $data = $cache->get($key);
        if ($data == false) {
            $data = self::find()->where(['language' => $language])->one();
            $cache->set($key, $data);
        }
        return $data;
    }

    public static function getById($id, $language = null)
    {
        $language = $language ?: Yii::$app->language;
        $cache = Yii::$app->cache;
        $key = 'redis-settings-co-so-get-by-id-' . $id . '-' . $language;
        $data = $cache->get($key);
        if ($data == false) {
            $data = self::find()->where(['id' => $id, 'language' => $language])->one();
            $cache->set($key, $data);
        }
        return $data;
    }
}
