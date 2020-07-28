<?php


namespace frontend\models;


use common\models\BlogsCommon;

class Blogs extends BlogsCommon
{
    public function getOneBLogsRecord()
    {
        return self::find()
            ->where(['status' => self::ACTIVE_STATUS])
            ->one();
    }
    public function getAllBLogsRecord()
    {
        return self::find()
            ->where(['status' => self::ACTIVE_STATUS])
            ->all();
    }
    public function getAllRecentPost()
    {
        return self::find()
            ->where(['status' => self::ACTIVE_STATUS])
            ->limit(5)
            ->orderBy(['date' => SORT_DESC])
            ->all();
    }
    public function getPagination()
    {

    }
}