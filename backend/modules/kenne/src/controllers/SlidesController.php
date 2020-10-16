<?php

namespace modava\kenne\controllers;

use modava\kenne\components\MyUpload;
use yii\db\Exception;
use Yii;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use backend\components\MyController;
use modava\kenne\models\Slides;
use modava\kenne\models\search\SlidesSearch;

/**
 * SlidesController implements the CRUD actions for Slides model.
 */
class SlidesController extends MyController
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
    * Lists all Slides models.
    * @return mixed
    */
    public function actionIndex()
    {
        $searchModel = new SlidesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (isset($param['update']) && isset($param['action'])){
            $model = Slides::findOne($param['update']);
            $model->sld_status = $model->sld_status == $model::DISABLE_STATUS ? $model::ACTIVE_STATUS : $model::DISABLE_STATUS ;
            $model->save();

        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
    * Displays a single Slides model.
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
    * Creates a new Slides model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
    public function actionCreate()
    {
        $model = new Slides();
    
        if ($model->load(Yii::$app->request->post())) {
            if ($model->sld_image != ""){
                $pathImage = FRONTEND_HOST_INFO. $model->sld_image;
                $path = Yii::getAlias('@frontend/web/uploads/kenne/');
                $imageName = null;
                foreach (Yii::$app->params['kenne'] as $key => $value) {
                    $pathSave = $path . $key;
                    if(!file_exists($pathSave) &&  !is_dir($pathSave)){
                        mkdir($pathSave);
                    }
                    $imageName = MyUpload::uploadFromOnline($value['width'],$value['height'],$pathImage,$pathSave.'/',$imageName);
                }
            }
            $model->sld_image = $imageName;

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
    * Updates an existing Slides model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()) {
                $pathImage = FRONTEND_HOST_INFO . $model->sld_image;
                $path = Yii::getAlias('@frontend/web/uploads/kenne/');
                $imageName = null;

                $oldImage = $model->getOldAttribute('sld_image');

                if ($model->updateAttributes(['sld_image'])) {
                    foreach (Yii::$app->params['kenne'] as $key => $value) {
                        $pathSave = $path . $key;
                        if (file_exists($pathSave . '/' . $oldImage) && $oldImage != null) {
                            unlink($pathSave . '/' . $oldImage);
                        }
                    }
                }

                foreach (Yii::$app->params['kenne'] as $key => $value) {
                    $pathSave = $path . $key;
                    if (!file_exists($pathSave) && !is_dir($pathSave)) {
                        mkdir($pathSave);
                    }
                    $imageName = MyUpload::uploadFromOnline($value['width'], $value['height'], $pathImage, $pathSave . '/', $imageName);
                }
                $model->sld_image = $imageName;

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
    * Deletes an existing Slides model.
    * If deletion is successful, the browser will be redirected to the 'index' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $path = Yii::getAlias('@frontend/web/uploads/kenne/');
        $image = $model->sld_image;
        foreach (Yii::$app->params['kenne'] as $key => $value) {
            $pathSave = $path . $key;
            if (file_exists($pathSave . '/' . $image) && $image != null) {
                unlink($pathSave . '/' . $image);
            }
        }

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
    * Finds the Slides model based on its primary key value.
    * If the model is not found, a 404 HTTP exception will be thrown.
    * @param integer $id
    * @return Slides the loaded model
    * @throws NotFoundHttpException if the model cannot be found
    */


    protected function findModel($id)
    {
        if (($model = Slides::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('kenne', 'The requested page does not exist.'));
    }
}
