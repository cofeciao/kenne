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
        $pages = $modelBlogs->getAllPagination($data);
        $tags = $modelBlogs->getAllTags();
        return $this->render('index',[
            'recentPost' => $recentPost,
            'pages' => $pages,
            'tags' => $tags,
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