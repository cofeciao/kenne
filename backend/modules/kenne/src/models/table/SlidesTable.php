<?php

namespace modava\kenne\models\table;

use cheatsheet\Time;
use modava\kenne\models\Categories;
use Yii;
use yii\db\ActiveRecord;

class SlidesTable extends \yii\db\ActiveRecord
{
    const ACTIVE_SLIDE = 1;
    const ACTIVE_BANNER_SMALL = 0;
    const ACTIVE_BANNER_BIG = 2;

    public static function tableName()
    {
        return 'slides';
    }

    public function getCategory()
    {
        //return $this->hasOne(Categories::class,['cat_id'=>'id'])->orderBy('id');
        $category = Categories::find()->all();
        return $category;
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
