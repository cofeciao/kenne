<?php

namespace frontend\controllers;

use common\helpers\MyHelper;
use frontend\components\MyController;
use frontend\models\Blogs;
use modava\blogs\models;
use modava\imagick\Helper;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

class BlogController extends MyController
{
    public function actionIndex()
    {
        $model = new Blogs();
        $data = $model->getAllBLogsRecord();
        $param = \Yii::$app->request->queryParams;

        if(isset($param['search'])){
//            $par = MyHelper::createAlias($param['search']);
             $data = $model->search($param['search']);
        }

        $recentPost = $model->getAllRecentPost();
        $tags = $model->getAllTags();
        $pages = $model->getAllPagination($data);

        return $this->render('index',[
            'recentPost' => $recentPost,
            'pages' => $pages,
            'tags' => $tags,
        ]);
    }

    public function actionBlogDetail($id)
    {
        $model = new Blogs();
        $data = $model->getOneBLogDetail($id);
        $recentPost = $model->getAllRecentPost();
        return $this->render('blog-detail',[
            'data' => $data,
            'recentPost' => $recentPost
        ]);
    }
}