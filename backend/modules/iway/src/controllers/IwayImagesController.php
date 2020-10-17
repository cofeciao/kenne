<?php

namespace modava\iway\controllers;

use backend\components\MyComponent;
use modava\iway\models\form\FormTrayImages;
use modava\iway\models\IwayTray;
use yii\db\ActiveRecord;
use yii\db\Exception;
use Yii;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use backend\components\MyController;
use modava\iway\models\IwayImages;
use modava\iway\models\search\IwayImagesSearch;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

/**
 * IwayImagesController implements the CRUD actions for IwayImages model.
 */
class IwayImagesController extends MyController
{
    public $parent_table = null;

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
        $searchModel = new IwayImagesSearch([
            'parent_table' => $this->parent_table,
        ]);
        $searchModel::setPathUpload($this->getPathUploadByParentTable());
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $totalPage = $this->getTotalPage($dataProvider);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'totalPage' => $totalPage,
        ]);
    }

    /**
     * Displays a single IwayImages model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionUpload($parent_table = null, $parent_id = null, $type = null, $id = null)
    {
        if (Yii::$app->request->isAjax) {
            if ($parent_id != null) {
                $parent = $this->findModelParent($parent_table, $parent_id);
                if ($parent == null) return $this->renderAjax('_error', [
                    'error' => 'Không tìm thấy thông tin parent'
                ]);
            }
            $model = new IwayImages([
                'parent_table' => $parent_table,
                'parent_id' => $parent_id,
                'type' => $type
            ]);
            if ($id != null) {
                $model = IwayImages::find()->where(['id' => $id])->one();
                if ($model->parent_table != $parent_table || $model->parent_id != $parent_id) return $this->renderAjax('_error', [
                    'error' => 'Thông tin hình ảnh không đúng'
                ]);
                if ($model->type != $type) return $this->renderAjax('_error', [
                    'error' => 'Thông tin loại hình ảnh không đúng'
                ]);
            }
            $model::setPathUpload($this->getPathUploadByParentTable($model->parent_table));
            return $this->renderAjax('@backend/modules/iway/src/views/iway-images/upload', [
                'model' => $model,
            ]);
        }
    }

    public function actionValidateUpload($id = null)
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = new IwayImages();
            if ($id != null) {
                $model = IwayImages::find()->where(['id' => $id])->one();
            }
            $model::setPathUpload($this->getPathUploadByParentTable($model->parent_table));
            if ($model->load(Yii::$app->request->post())) {
                return ActiveForm::validate($model);
            }
        }
    }

    public function actionSubmitUpload($id = null)
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = new IwayImages();
            if ($id != null) {
                $model = IwayImages::find()->where(['id' => $id])->one();
            }
            $model::setPathUpload($this->getPathUploadByParentTable($model->parent_table));
            $model->scenario = IwayImages::SCENARIO_SAVE;
            if (!$model->load(Yii::$app->request->post())) return [
                'code' => 400,
                'msg' => 'Lỗi load dữ liệu',
                'error' => $model->getErrors(),
                'data' => Yii::$app->request->post()
            ];
            $fileImage = UploadedFile::getInstances($model, 'fileImage');
            $fileImageBase64 = $model->fileImageBase64;
            if ($model->getOldAttribute('status') == IwayImages::CHUA_DAT && ($fileImage != null || $fileImageBase64 != null)) {
                /* Chưa đạt && upload lại hình => tạo model mới để lưu hình */
                $model = new IwayImages();
                $model::setPathUpload($this->getPathUploadByParentTable());
                $model->scenario = IwayImages::SCENARIO_SAVE;
                $model->load(Yii::$app->request->post());
                $model->setAttributes([
                    'status' => IwayImages::CHUA_DANH_GIA,
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
                    'data' => $model->fileImage
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
     * Creates a new IwayImages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IwayImages();
        $model::setPathUpload($this->getPathUploadByParentTable());

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
     * Updates an existing IwayImages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model::setPathUpload($this->getPathUploadByParentTable($model->parent_table));

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
     * Deletes an existing IwayImages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model::setPathUpload($this->getPathUploadByParentTable());
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

    protected function findModelParent($parent_table, $parent_id)
    {
        /* @var $model ActiveRecord */
        $model = $this->getModel($parent_table);
        if ($model == null) return null;
        return $model::findOne($parent_id);
    }

    /**
     * @param $parent_table
     * @return string|null
     */
    protected function getModel($parent_table)
    {
        return (new IwayImages())->getModelParent($parent_table);
    }

    protected function getPathUploadByParentTable($parent_table = null)
    {
        if ($parent_table == null) $parent_table = $this->parent_table;
        return IwayImages::getPathUploadByParentTable($parent_table);
    }

    /**
     * Finds the IwayImages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IwayImages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IwayImages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        // throw new NotFoundHttpException(BackendModule::t('backend','The requested page does not exist.'));
    }
}
