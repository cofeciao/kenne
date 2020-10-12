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
        $tray_images = IwayTrayImages::find()
            ->select([
                IwayTrayImages::tableName() . '.image',
                IwayTrayImages::tableName() . '.tray_id',
                IwayTrayImages::tableName() . '.type',
                IwayTrayImages::tableName() . '.created_at',
                IwayTrayImages::tableName() . '.evaluate',
                IwayTrayImages::tableName() . '.evaluate_at',
                IwayTrayImages::tableName() . '.evaluate_by',
            ])
            ->where(['tray_id' => $id])
            ->groupBy([
                'type',
                'image',
                'tray_id',
                'created_at',
                'evaluate',
                'evaluate_at',
                'evaluate_by',
            ])
            ->orderBy([IwayTrayImages::tableName() . '.created_at' => SORT_DESC])
            ->indexBy('type')
            ->all();
        $model = new FormTrayImages();
        return $this->render('view', [
            'tray' => $tray,
            'model' => $model,
            'tray_images' => $tray_images
        ]);
    }

    public function actionUpload($id = null, $image = null)
    {
        if (Yii::$app->request->isAjax) {
            $tray = IwayTray::findOne(['id' => $id]);
            if ($tray == null) return $this->renderAjax('_error', [
                'error' => 'Không tìm thấy thông tin tray'
            ]);
            if (!array_key_exists($image, FormTrayImages::TYPE)) return $this->renderAjax('_error', [
                'error' => 'Hình cần upload không phù hợp'
            ]);
            $model = new FormTrayImages([
                'tray' => $id,
                'type' => $image
            ]);
            $tray_image = IwayTrayImages::find()
                ->where([
                    IwayTrayImages::tableName() . '.tray_id' => $id,
                    IwayTrayImages::tableName() . '.type' => $image,
                ])
                ->orderBy([
                    IwayTrayImages::tableName() . '.created_at' => SORT_DESC
                ])
                ->one();
            if ($tray_image != null && $tray_image->getImage() != null) $model->image = $tray_image->getImage();
            return $this->renderAjax('upload', [
                'tray' => $tray,
                'model' => $model,
                'tray_image' => $tray_image
            ]);
        }
    }

    public function actionValidateUpload()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = new FormTrayImages();
            if ($model->load(Yii::$app->request->post())) {
                return ActiveForm::validate($model);
            }
        }
    }

    public function actionSubmitUpload()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = new FormTrayImages();
            $model->scenario = FormTrayImages::SCENARIO_SAVE;
            if (!$model->load(Yii::$app->request->post()) || !$model->validate()) return [
                'code' => 400,
                'msg' => 'Có lỗi khi kiểm tra dữ liệu',
                'error' => $model->getErrors()
            ];
            if (!$model->saveTrayImage()) {
                $model->deleteTrayImage();
                return [
                    'code' => 400,
                    'msg' => 'Upload hình thất bại'
                ];
            }
            return [
                'code' => 200,
                'msg' => 'Upload hình thành công'
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
