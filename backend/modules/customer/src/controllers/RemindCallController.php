<?php

namespace modava\customer\controllers;

use backend\components\MyComponent;
use Yii;
use backend\components\MyController;
use modava\customer\models\search\RemindCallSearch;

/**
 * SalesOnlineRemindCallController implements the CRUD actions for Customer model.
 */
class RemindCallController extends MyController
{
    /**
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RemindCallSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $totalPage = $this->getTotalPage($dataProvider);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'totalPage'    => $totalPage,
        ]);
    }

    /**
     * @param $perpage
     */
    public function actionPerpage($perpage)
    {
        MyComponent::setCookies('pageSize', $perpage);
    }

    /**
     * @param $dataProvider
     * @return float|int
     */
    public function getTotalPage($dataProvider)
    {
        if (MyComponent::hasCookies('pageSize')) {
            $dataProvider->pagination->pageSize = MyComponent::getCookies('pageSize');
        } else {
            $dataProvider->pagination->pageSize = 10;
        }

        $pageSize   = $dataProvider->pagination->pageSize;
        $totalCount = $dataProvider->totalCount;
        $totalPage  = (($totalCount + $pageSize - 1) / $pageSize);

        return $totalPage;
    }
}
