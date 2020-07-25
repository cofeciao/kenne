<?php

namespace frontend\controllers;

use common\models\ProductsCommon;
use frontend\models\Activity;
use frontend\models\ExHistory;
use frontend\models\Exploration;
use frontend\models\ExStory;
use frontend\models\GalleryCategory;
use frontend\models\News;
use frontend\models\search\SearchNews;
use frontend\models\search\SearchVideo;
use frontend\models\TagSeo;
use Yii;
use frontend\components\MyController;
use yii\helpers\Url;
use function GuzzleHttp\Promise\all;

class SiteController extends MyController
{

    public function actionIndex()
    {
        $proNew = ProductsCommon::find()->orderBy('id')->offset(0)->limit(6)->all();
        return $this->render('index', [
            'data'=>$proNew,
        ]);
    }


}
