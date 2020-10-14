<?php

namespace modava\iway\controllers;

use backend\components\MyComponent;
use modava\iway\models\form\FormTrayImages;
use modava\iway\models\IwayTray;
use yii\db\Exception;
use Yii;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use backend\components\MyController;
use modava\iway\models\IwayTrayImages;
use modava\iway\models\search\IwayTrayImagesSearch;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

/**
 * IwayTrayImagesController implements the CRUD actions for IwayTrayImages model.
 */
class IwayTrayImagesController extends MyController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @return \yii\web\Response
     */
    public function actionIndex()
    {
        return $this->redirect(['iway/iway-tray/index']);
    }

    /**
     * Displays a single IwayTrayImages model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $tray = IwayTray::findOne(['id' => $id]);
        if ($tray == null) return $this->redirect(['/iway/iway-tray/index']);
        $query = IwayTrayImages::find()
            ->where(['tray_id' => $id])
            ->orderBy([IwayTrayImages::tableName() . '.created_at' => SORT_ASC])
            ->indexBy('type');
        $tray_images = $query->all();
        $model = new FormTrayImages();
        return $this->render('view', [
            'tray' => $tray,
            'model' => $model,
            'tray_images' => $tray_images
        ]);
    }

    public function actionUpload($tray_id = null, $type = null, $id = null)
    {
        if (Yii::$app->request->isAjax) {
            $tray = IwayTray::findOne(['id' => $tray_id]);
            if ($tray == null) return $this->renderAjax('_error', [
                'error' => 'Không tìm thấy thông tin tray'
            ]);
            if (!array_key_exists($type, IwayTrayImages::TYPE)) return $this->renderAjax('_error', [
                'error' => 'Hình cần upload không phù hợp'
            ]);
            $model = new IwayTrayImages([
                'tray_id' => $tray_id,
                'type' => $type
            ]);
            if ($id != null) {
                $model = IwayTrayImages::find()->where(['id' => $id])->one();
                if ($model->tray_id != $tray_id) return $this->renderAjax('_error', [
                    'error' => 'Thông tin tray không đúng'
                ]);
                if ($model->type != $type) return $this->renderAjax('_error', [
                    'error' => 'Thông tin hình ảnh không đúng'
                ]);
            }
            return $this->renderAjax('upload', [
                'model' => $model,
            ]);
        }
    }

    public function actionValidateUpload($id = null)
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = new IwayTrayImages();
            if ($id != null) {
                $model = IwayTrayImages::find()->where(['id' => $id])->one();
            }
            if ($model->load(Yii::$app->request->post())) {
                return ActiveForm::validate($model);
            }
        }
    }

    public function actionSubmitUpload($id = null)
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = new IwayTrayImages();
            if ($id != null) {
                $model = IwayTrayImages::find()->where(['id' => $id])->one();
            }
            $model->scenario = IwayTrayImages::SCENARIO_SAVE;
            if (!$model->load(Yii::$app->request->post())) return [
                'code' => 400,
                'msg' => 'Lỗi load dữ liệu',
                'error' => $model->getErrors(),
                'data' => Yii::$app->request->post()
            ];
            $fileImage = UploadedFile::getInstance($model, 'fileImage');
            $fileImageBase64 = $model->fileImageBase64;
            if ($model->getOldAttribute('status') == IwayTrayImages::CHUA_DAT && ($fileImage != null || $fileImageBase64 != null)) {
                /* Chưa đạt && upload lại hình => tạo model mới để lưu hình */
                $model = new IwayTrayImages();
                $model->scenario = IwayTrayImages::SCENARIO_SAVE;
                $model->load(Yii::$app->request->post());
                $model->setAttributes([
                    'status' => IwayTrayImages::CHUA_DANH_GIA,
                    'evaluate' => null,
                    'evaluate_at' => null,
                    'evaluate_by' => null
                ]);
            }
            if (!$model->validate()) {
                return [
                    'code' => 400,
                    'msg' => 'Có lỗi khi kiểm tra dữ liệu',
                    'error' => $model->getErrors(),
                    'data' => Yii::$app->request->post()
                ];
            }
            if (!$model->save()) {
                return [
                    'code' => 400,
                    'msg' => 'Cập nhật thất bại'
                ];
            }
            return [
                'code' => 200,
                'msg' => 'Cập nhật thành công',
                'data' => $model->getAttributes()
            ];
        }
    }

    /**
     * Creates a new IwayTrayImages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IwayTrayImages();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-view', [
                    'title' => 'Thông báo',
                    'text' => 'Tạo mới thành công',
                    'type' => 'success'
                ]);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $errors = Html::tag('p', 'Tạo mới thất bại');
                foreach ($model->getErrors() as $error) {
                    $errors .= Html::tag('p', $error[0]);
                }
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-form', [
                    'title' => 'Thông báo',
                    'text' => $errors,
                    'type' => 'warning'
                ]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing IwayTrayImages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->save()) {
                    Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-view', [
                        'title' => 'Thông báo',
                        'text' => 'Cập nhật thành công',
                        'type' => 'success'
                    ]);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                $errors = Html::tag('p', 'Cập nhật thất bại');
                foreach ($model->getErrors() as $error) {
                    $errors .= Html::tag('p', $error[0]);
                }
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-form', [
                    'title' => 'Thông báo',
                    'text' => $errors,
                    'type' => 'warning'
                ]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing IwayTrayImages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        try {
            if ($model->delete()) {
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-index', [
                    'title' => 'Thông báo',
                    'text' => 'Xoá thành công',
                    'type' => 'success'
                ]);
            } else {
                $errors = Html::tag('p', 'Xoá thất bại');
                foreach ($model->getErrors() as $error) {
                    $errors .= Html::tag('p', $error[0]);
                }
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-index', [
                    'title' => 'Thông báo',
                    'text' => $errors,
                    'type' => 'warning'
                ]);
            }
        } catch (Exception $ex) {
            Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-index', [
                'title' => 'Thông báo',
                'text' => Html::tag('p', 'Xoá thất bại: ' . $ex->getMessage()),
                'type' => 'warning'
            ]);
        }
        return $this->redirect(['index']);
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

        $pageSize = $dataProvider->pagination->pageSize;
        $totalCount = $dataProvider->totalCount;
        $totalPage = (($totalCount + $pageSize - 1) / $pageSize);

        return $totalPage;
    }

    /**
     * Finds the IwayTrayImages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IwayTrayImages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IwayTrayImages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        // throw new NotFoundHttpException(BackendModule::t('backend','The requested page does not exist.'));
    }
}
