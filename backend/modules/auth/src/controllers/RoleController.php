<?php

namespace modava\auth\controllers;

use backend\components\MyComponent;
use modava\auth\models\RbacAuthItem;
use modava\auth\models\search\RbacAuthItemSearch;
use modava\auth\models\table\RbacAuthItemTable;
use modava\auth\models\User;
use Yii;
use modava\auth\components\MyAuthController;
use yii\db\Exception;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\rbac\Item;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class RoleController extends MyAuthController
{
    public $searchClass = [
        'class' => RbacAuthItemSearch::class,
    ];

    protected $type = Item::TYPE_ROLE;

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

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->layout = 'user';
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $user = new User();
        $roleName = $user->getRoleName(Yii::$app->user->id);
        $searchModel = Yii::createObject($this->searchClass);
        $searchModel->type = Item::TYPE_ROLE;
        $dataProvider = $searchModel->searchRole(Yii::$app->request->queryParams);
        unset($dataProvider->allModels['loginToBackend']);
        unset($dataProvider->allModels[$roleName]);

        if (MyComponent::hasCookies('pageSize')) {
            $dataProvider->pagination->pageSize = MyComponent::getCookies('pageSize');
        } else {
            $dataProvider->pagination->pageSize = 20;
        }
        $pageSize = $dataProvider->pagination->pageSize;
        $totalCount = $dataProvider->totalCount;
        $totalPage = (($totalCount + $pageSize - 1) / $pageSize);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'totalPage' => $totalPage,
        ]);
    }


    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if (!$model) return $this->redirect(['index']);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionPermissionForRole()
    {
        if (Yii::$app->request->isAjax) {
            $result = [];
            $name = Yii::$app->request->get('name');
            $permission = Yii::$app->authManager->getPermissions();
            $permission_user = array_keys(Yii::$app->authManager->getPermissionsByRole($name));

            if (!Yii::$app->user->can(User::DEV)) {
                unset($permission['loginToBackend']);
                unset($permission_user['loginToBackend']);
            }

            foreach ($permission as $name) {
                if (in_array($name->name, $permission_user)) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                $result[] = [
                    'name' => $name->name,
                    'description' => $name->description,
                    'selected' => $selected
                ];
            }
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $result;
        }
    }

    public function actionPermissionChange()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $itemAssign = [];
        $name = Yii::$app->request->post('name');
        $item = Yii::$app->request->post('item');

        if ($item != null && count($item) != 0) {
            foreach ($item as $value) {
                $itemAssign[] = $value;
            }
        }

        $permission_user = Yii::$app->authManager->getPermissionsByRole($name);
        unset($permission_user["loginToBackend"]);
        $permission_user = array_keys($permission_user);

        $model = $this->findModel($name);

        if (count($itemAssign) > count($permission_user)) {
            $itemAdd = array_diff($itemAssign, $permission_user);
            if ($model->addChildren($itemAdd)) {
                return 1;
            }
        } elseif (count($itemAssign) < count($permission_user)) {
            $itemRemove = array_diff($permission_user, $itemAssign);
            if ($model->removeChildren($itemRemove)) {
                return 1;
            }
        }
        return 0;
    }

    protected function findModel($name)
    {
        $auth = Yii::$app->authManager;

        $user = new User();

        if (!$user->checkParent($name, $user->getRoleName(Yii::$app->user->id))) {
            Yii::$app->session->setFlash('alert', [
                'body' => 'Bạn không có quyền.',
                'class' => 'bg-danger',
            ]);
            return false;
        }

        $item = $this->type === Item::TYPE_ROLE ? $auth->getRole($name) : $auth->getPermission($name);

        if (empty($item)) {
            return false;
        }
        if ($item->name == 'loginToBackend' || $item->name == $user->getRoleName(Yii::$app->user->id)) {
            header("Location: " . FRONTEND_HOST_INFO, true, 301);
            exit();
        }

        return new RbacAuthItem($item);
    }
}