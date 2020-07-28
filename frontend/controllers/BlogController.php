<?php


namespace frontend\controllers;


use frontend\components\MyController;
use frontend\models\Blogs;
use modava\blogs\models;
use yii\data\Pagination;


class BlogController extends MyController
{
    public function actionIndex()
    {
        $modelBlogs = new Blogs();
        $data = $modelBlogs->getAllBLogsRecord();
        $RecentPost = $modelBlogs->getAllRecentPost();

//        $query = Blogs::find()->where(['status' => 1]);
//        $countQuery = clone $query;
//        $pages = new Pagination(['totalCount' => $countQuery->count()]);
//        $pages->pageSize = 2;
//
//        $data = $query->offset($pages->offset)
//            ->limit($pages->limit)
//            ->all();



        return $this->render('index',[
            'data' => $data,
            'RecentPost' => $RecentPost,
//            'pages' => $pages
        ]);
    }
}