<?php

namespace modava\video\models\table;

use cheatsheet\Time;
use modava\video\models\query\VideoTypeQuery;
use Yii;
use yii\db\ActiveRecord;

class VideoTypeTable extends \yii\db\ActiveRecord
{
    const STATUS_DISABLED = 0;
    const STATUS_PUBLISHED = 1;

    public static function tableName()
    {
        return 'video_type';
    }

    public static function find()
    {
        return new VideoTypeQuery(get_called_class());
    }

    public static function getAllVideoType($lang = null)
    {
        $cache = Yii::$app->cache;
        $key = 'redis-get-all-video-type-' . $lang;

        $data = $cache->get($key);

        if ($data === false) {
            $data = self::find()->where(['language' => $lang])->published()->sortDescById()->all();
            $cache->set($key, $data, Time::SECONDS_IN_A_MONTH);
        }

        return $data;
    }

    public function afterDelete()
    {
        $cache = Yii::$app->cache;
        $keys = [
            'redis-get-all-video-type-' . $this->language,
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
            'redis-get-all-video-type-' . $this->language,
        ];
        foreach ($keys as $key) {
            $cache->delete($key);
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
}
