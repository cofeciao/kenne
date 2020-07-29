<?php

namespace frontend\models;

use modava\blogs\models\table\BlogsTable;

class Blogs extends BlogsTable
{
    public function getOneBLogsRecord()
    {
        return self::find()
            ->where(['status' => self::STATUS_PUBLISHED])
            ->one();
    }
    public function getAllBLogsRecord()
    {
        return self::find()
            ->where(['status' => self::STATUS_PUBLISHED])
            ->all();
    }
    public function getAllRecentPost()
    {
        return self::find()
            ->where(['status' => self::STATUS_PUBLISHED])
            ->limit(5)
            ->orderBy(['date' => SORT_DESC])
            ->all();
    }
    public function getPagination()
    {

    }
}