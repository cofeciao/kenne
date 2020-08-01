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
        $recentPost = $modelBlogs->getAllRecentPost();
        $pages = $modelBlogs->getAllPagination();
        $tags = $modelBlogs->getAllTags();

        return $this->render('index',[
            'RecentPost' => $recentPost,
            'pages' => $pages,
            'tags' => $tags,
            'data' => $data
        ]);
    }
    public function actionBlogDetail($id)
    {
        $modelBlogs = new Blogs();
        $data = $modelBlogs->getOneBLogDetail($id);
        $recentPost = $modelBlogs->getAllRecentPost();
        return $this->render('blog-detail',[
            'data' => $data,
            'recentPost' => $recentPost
        ]);
    }
}