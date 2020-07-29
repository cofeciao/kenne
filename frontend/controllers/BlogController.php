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
        $pages = $modelBlogs->getAllPagination();
        $tags = $modelBlogs->getAllTags();

        return $this->render('index',[
            'RecentPost' => $RecentPost,
            'pages' => $pages,
            'tags' => $tags,
        ]);
    }
}