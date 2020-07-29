<?php

namespace frontend\models;

use modava\blogs\models\table\BlogsTable;
use yii\data\Pagination;
use yii\elasticsearch\ActiveDataProvider;

class Blogs extends BlogsTable
{
    public function getAllBLogsRecord()
    {
        $data = self::find()
            ->where(['status' => self::ACTIVE_STATUS]);
        return $data;
    }

    public function getAllRecentPost()
    {
        return self::find()
            ->where(['status' => self::STATUS_PUBLISHED])
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
        echo '<pre>';
            print_r($dataProvider);
        echo '</pre>';die;
    }
}