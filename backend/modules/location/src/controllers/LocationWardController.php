<?php

namespace modava\location\controllers;

use modava\location\models\table\LocationWardTable;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use modava\location\LocationModule;
use backend\components\MyController;
use modava\location\models\LocationWard;
use modava\location\models\search\LocationWardSearch;
use yii\web\Response;

/**
 * LocationWardController implements the CRUD actions for LocationWard model.
 */
class LocationWardController extends MyController
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
     * Lists all LocationWard models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LocationWardSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LocationWard model.
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
     * Creates a new LocationWard model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LocationWard();

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
     * Updates an existing LocationWard model.
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
     * Deletes an existing LocationWard model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
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
        return $this->redirect(['index']);
    }

    public function actionGetWardByDistrict()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $district = Yii::$app->request->get('district');
            $data = ArrayHelper::map(LocationWardTable::getWardByDistrict($district), 'id', 'name');
            return [
                'code' => 200,
                'data' => $data
            ];
        }
    }

    /**
     * Finds the LocationWard model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LocationWard the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */


    protected function findModel($id)
    {
        if (($model = LocationWard::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('location', 'The requested page does not exist.'));
    }
}
