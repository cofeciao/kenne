<?php

namespace modava\article\controllers;

use modava\article\components\MyArticleController;


class ArticleController extends MyArticleController
{
    public function behaviors()
    {
        return parent::behaviors(); // TODO: Change the autogenerated stub
    }

    public function actionIndex()
    {
        return $this->render('index', []);
    }
}
