<?php

namespace backend\modules\filemanager\controllers;


use backend\components\MyController;

class FilemanagerController extends MyController
{

    public function actionIndex()
    {
        $view = $this->getView();

        $insFile = \modava\tiny\FileManagerAsset::register($view);

        $link = $insFile->baseUrl . '/filemanager/';

        $configPath = [
            'upload_dir' => '/uploads/filemanager/source/',
            'current_path' => '../../../../../../frontend/web/uploads/filemanager/source/',
            'thumbs_base_path' => '../../../../../../frontend/web/uploads/filemanager/thumbs/',
            'base_url' => \Yii::getAlias('@frontendUrl'),
            'FileManagerPermisstion' => \modava\tiny\components\FileManagerPermisstion::setPermissionFileAccess()
        ];
        $filemanager_access_key = urlencode(serialize($configPath));

        return $this->render('index', [
            'link' => $link,
            'filemanager_access_key' => $filemanager_access_key
        ]);
    }
}
