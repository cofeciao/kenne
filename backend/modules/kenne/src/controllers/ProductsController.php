<?php

namespace modava\kenne\controllers;

use common\helpers\MyHelper;
use modava\kenne\components\MyUpload;
use yii\db\Exception;
use Yii;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use backend\components\MyController;
use modava\kenne\models\Products;
use modava\kenne\models\search\ProductsSearch;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends MyController
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $param =  Yii::$app->request->queryParams;

        if (isset($param['update']) && isset($param['action'])){
            $model = self::findOne($param['update']);
            $model->pro_status = $model->pro_status == $model::DISABLE_STATUS ? $model::ACTIVE_STATUS : $model::DISABLE_STATUS ;
            $model->save();

        }
        $dataProvider = $searchModel->search($param);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Products model.
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->pro_image != "") {
                $pathImage = FRONTEND_HOST_INFO . $model->pro_image;
                $path = Yii::getAlias('@frontend/web/uploads/kenne/');
                /*
                * $path: /var/www/mongdaovan86/frontend/web/uploads/kenne/
                * Yii::$app->params['kenne'] : mảng chứa thư mục ảnh 150x150,300x300
                * pathimage: http://project.tm/uploads/filemanager/source/Screenshot%20from%202020-07-30%2015-42-43.png
                *        [FRONTEND_HOST_INFO][                      $model->pro_image                               ]
                */

                $imageName = null;
                foreach (Yii::$app->params['kenne'] as $key => $value) {
                    $pathSave = $path . $key;
                    if (!file_exists($pathSave) && !is_dir($pathSave)) {
                        mkdir($pathSave);
                    }
                    $imageName = MyUpload::uploadFromOnline($value['width'], $value['height'], $pathImage, $pathSave . '/', $imageName);
                }

            }
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');
            $model->pro_slug = MyHelper::createAlias($model->pro_name);
            $model->cat_id = Yii::$app->request->post()['Products']['cat_id'];
            $model->pro_image = $imageName;
            /* $tempName = explode('/',$model->pro_image->tempName);
             $extension = explode('/',$model->pro_image->type);*/
            /* echo "<pre>";
             print_r($extension);
             echo "</pre>";
             die;*/
            /* if($model->pro_image){
                 $path = Yii::getAlias('@frontend/web');
                 $pathImage = '/uploads/';
                 $image = $tempName[2].'.'.$extension[1];
                 if (!file_exists($path.$pathImage)){
                     mkdir($path.$pathImage,0755,true);
                     $model->pro_image->saveAs($path.$pathImage.$image);
                 }else{
                     $model->pro_image->saveAs($path.$pathImage.$image);
                 }
             }
             $model->pro_image =$pathImage.$image;*/
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
     * Updates an existing Products model.
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
                $pathImage = FRONTEND_HOST_INFO . $model->pro_image;
                $path = Yii::getAlias('@frontend/web/uploads/kenne/');
                $imageName = null;

                $oldImage = $model->getOldAttribute('pro_image');

                if ($model->updateAttributes(['pro_image'])) {
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
                $model->pro_image = $imageName;




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
     * Deletes an existing Products model.
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
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */


    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('kenne', 'The requested page does not exist.'));
    }
}
