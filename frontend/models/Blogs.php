<?php

namespace frontend\models;

use modava\blogs\models\table\BlogsTable;
use yii\data\Pagination;
use yii\elasticsearch\ActiveDataProvider;

class Blogs extends BlogsTable
{
    public function getAllBLogsRecord()
    {
        return self::find()
            ->where(['status' => self::ACTIVE_STATUS])
            ->all();
    }
    public function getOneBLogDetail($id)
    {
        return self::find()
            ->where(['id' => $id])
            ->one();
    }
    public function getAllRecentPost()
    {
        return self::find()
            ->where(['status' => self::ACTIVE_STATUS])
            ->limit(5)
            ->orderBy(['date' => SORT_DESC])
            ->all();
    }

    public function getAllTags()
    {
        return self::find()
            ->where(['status' => self::ACTIVE_STATUS])
            ->select(['tags'])
            ->distinct()
            ->all();
    }

    public function getAllPagination()
    {
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => self::find()->where(['status' => self::ACTIVE_STATUS]),
            'pagination' => [
                'pageSize' => $pageSize = 4,
            ]
        ]);
        return $dataProvider;
    }
}