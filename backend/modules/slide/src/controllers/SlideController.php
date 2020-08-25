<?php

namespace modava\slide\controllers;

use modava\slide\components\MyUpload;
use modava\slide\models\table\SlideCategoryTable;
use modava\slide\models\table\SlideTypeTable;
use yii\db\Exception;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use modava\slide\SlideModule;
use modava\slide\components\MySlideController;
use modava\slide\models\Slide;
use modava\slide\models\search\SlideSearch;
use yii\web\Response;

/**
 * SlideController implements the CRUD actions for Slide model.
 */
class SlideController extends MySlideController
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
     * Lists all Slide models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlideSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLoadCategoriesByLang($lang = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ArrayHelper::map(SlideCategoryTable::getAllSlideCategory($lang), 'id', 'title');
    }

    public function actionLoadTypesByLang($lang = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ArrayHelper::map(SlideTypeTable::getAllSlideType($lang), 'id', 'title');
    }

    /**
     * Displays a single Slide model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Slide model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slide();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if($model->save()) {
                    $imageName = null;
                    if ($model->image != "") {
                        $pathImage = FRONTEND_HOST_INFO . $model->image;
                        $path = Yii::getAlias('@frontend/web/uploads/slide/');
                        foreach (Yii::$app->params['slide'] as $key => $value) {
                            $pathSave = $path . $key;
                            if (!file_exists($pathSave) && !is_dir($pathSave)) {
                                mkdir($pathSave);
                            }
                            $imageName = MyUpload::uploadFromOnline($value['width'], $value['height'], $pathImage, $pathSave . '/', $imageName);
                        }

                    }
                    $model->image = $imageName;
                    $model->updateAttributes(['image']);
                    Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-view', [
                        'title' => 'Thông báo',
                        'text' => 'Tạo mới thành công',
                        'type' => 'success'
                    ]);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
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
     * Updates an existing Slide model.
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
                $oldImage = $model->getOldAttribute('image');
                if ($model->save()) {
                    if ($model->getAttribute('image') !== $oldImage) {
                        if ($model->getAttribute('image') != '') {
                            $pathImage = FRONTEND_HOST_INFO . $model->image;
                            $path = Yii::getAlias('@frontend/web/uploads/slide/');
                            $imageName = null;
                            foreach (Yii::$app->params['slide'] as $key => $value) {
                                $pathSave = $path . $key;
                                if (!file_exists($pathSave) && !is_dir($pathSave)) {
                                    mkdir($pathSave);
                                }
                                $resultName = MyUpload::uploadFromOnline($value['width'], $value['height'], $pathImage, $pathSave . '/', $imageName);
                                if ($imageName == null) {
                                    $imageName = $resultName;
                                }
                            }

                            $model->image = $imageName;
                            if ($model->updateAttributes(['image'])) {
                                foreach (Yii::$app->params['slide'] as $key => $value) {
                                    $pathSave = $path . $key;
                                    if (file_exists($pathSave . '/' . $oldImage) && $oldImage != null) {
                                        unlink($pathSave . '/' . $oldImage);
                                    }

                                }
                            }
                        }
                    }
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
     * Deletes an existing Slide model.
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
     * Finds the Slide model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slide the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */


    protected function findModel($id)
    {
        if (($model = Slide::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(SlideModule::t('slide', 'The requested page does not exist.'));
    }
}
