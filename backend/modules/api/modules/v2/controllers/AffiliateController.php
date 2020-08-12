<?php

namespace backend\modules\api\modules\v2\controllers;

use yii\helpers\ArrayHelper;
use backend\modules\user\models\User;
use backend\components\CustomerModel;
use backend\modules\api\modules\v2\components\RestfullController;
use backend\modules\clinic\controllers\TkncController;
use backend\modules\clinic\models\PhongKhamDonHang;
use backend\modules\clinic\models\search\ClinicSearch;
use Yii;

class AffiliateController extends RestfullController
{
    public $modelClass = 'backend\modules\api\modules\v1\models\UserApi';

    /* 
     * DS Khách hàng hoàn thành dịch vụ
     */
    public function actionCompleteCustomerService()
    {
        $searchModel = new ClinicSearch();
        $dataProvider = $searchModel->searchCompleteCustomerService(Yii::$app->request->queryParams);

        $page = isset($param['page']) ? $param['page'] : 0;
        $per_page = isset($param['per-page']) ? $param['per-page'] : 0;
        $totalCount = $dataProvider->getTotalCount();
        if ($page * $per_page > $totalCount) {
            return [];
        }
        $pageSize = $dataProvider->pagination->pageSize;
        $totalCount = $dataProvider->totalCount;
        $totalPage = (($totalCount + $pageSize - 1) / $pageSize);

        $aData = $dataProvider->getModels();
        $result = [];
        foreach ($aData as $model) {
            $result[] = $this->getCustomerDetail($model);
        }
        return [
            'data' => $result,
            'totalPage' => $totalPage,
            'totalCount' => $totalCount,
        ];
    }

    public function actionNotCompleteCustomerService()
    {
        // $query = PhongKhamDonHang::find();
        // $query->joinWith(['customerOnlineHasOne']);

        $searchModel = new ClinicSearch();
        $dataProvider = $searchModel->searchNotCompleteCustomerService(Yii::$app->request->queryParams);

        $page = isset($param['page']) ? $param['page'] : 0;
        $per_page = isset($param['per-page']) ? $param['per-page'] : 0;
        $totalCount = $dataProvider->getTotalCount();
        if ($page * $per_page > $totalCount) {
            return [];
        }

        $pageSize = $dataProvider->pagination->pageSize;
        $totalCount = $dataProvider->totalCount;
        $totalPage = (($totalCount + $pageSize - 1) / $pageSize);

        return [
            'data' => $dataProvider->getModels(),
            'totalPage' => $totalPage,
            'totalCount' => $totalCount,
        ];
    }

    /**
     * Thong tin khach hang
     */
    public function actionGetCustomer($id)
    {
        $model = CustomerModel::findOne($id);

        if ($model !== null) {
            // $result = ArrayHelper::toArray($model);
            // $donHang = $model->donHangs;
            // $aDonHang = [];
            // foreach ($donHang as $mDonHang) {
            //     $itemDonHang = ArrayHelper::toArray($mDonHang);
            //     $itemDonHang['thanh_toan'] = $mDonHang->phongKhamDonHangWThanhToanHasMany;
            //     $aDonHang[] = $itemDonHang;
            // }
            // $result['don_hang'] = $aDonHang; //$model->donHangs;
            $result = $this->getCustomerDetail($model);
            return [
                'data' => $result
            ];
        }

        return [
            'data' => $model
        ];
    }

    public function getCustomerDetail($model)
    {
        $result = ArrayHelper::toArray($model);
        $donHang = $model->donHangs;
        $aDonHang = [];
        foreach ($donHang as $mDonHang) {
            $itemDonHang = ArrayHelper::toArray($mDonHang);
            $itemDonHang['chi_tiet'] = $mDonHang->phongKhamDonHangWOrderHasMany;
            $itemDonHang['thanh_toan'] = $mDonHang->phongKhamDonHangWThanhToanHasMany;
            $aDonHang[] = $itemDonHang;
        }
        $result['don_hang'] = $aDonHang;
        $result['image'] = $model->showImageGoogleDrive($model->id,  $model->slug,  TkncController::FOLDER);
        return $result;
    }

    /*
     * Danh sach nhan vien theo role
     */
    public function actionListUsersByRole($role)
    {
        $aUser = User::getUsersByRoles([$role]);
        $result = [];
        foreach ($aUser as $item) {
            $result[] = [
                'id' => $item->id,
                'fullname' => $item->fullname,
            ];
        }
        return $result;
    }

    /*
     * Nhan vien theo ID
     */
    public function actionGetUser($id)
    {
        $aUser = User::findOne($id);
        $result = ArrayHelper::toArray($aUser);
        unset($result['auth_key']);
        unset($result['access_token']);
        unset($result['password_hash']);
        return $result;
    }
}
