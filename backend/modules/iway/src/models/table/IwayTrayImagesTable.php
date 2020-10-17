<?php

namespace modava\iway\models\table;

use cheatsheet\Time;
use modava\iway\models\IwayTray;
use modava\iway\models\query\IwayTrayImagesQuery;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "iway_tray_images".
 *
 * @property int $id
 * @property int $tray_id ID tray
 * @property string $image Hình ảnh tray
 * @property int $type Loại hình ảnh: chụp thẳng, chụp trái, chụp phải,...
 * @property int $status Trạng thái đánh giá: 0 - chưa đánh giá, 1 - đạt, 2 - chưa đạt
 * @property int $created_at Thời gian chụp
 * @property string $evaluate Đánh giá của bác sĩ
 * @property int $evaluate_at Thời gian đánh giá
 * @property int $evaluate_by Bác sĩ đánh giá
 */
class IwayTrayImagesTable extends \yii\db\ActiveRecord
{
    const CHUA_DANH_GIA = 0;
    const CHUA_DAT = 1;
    const DAT = 2;
    const STATUS = [
        self::CHUA_DANH_GIA => 'Chưa đánh giá',
        self::CHUA_DAT => 'Chưa đạt',
        self::DAT => 'Đạt',
    ];

    const THANG_CAN_CHAT_KHONG_DEO_TRAY = 0;
    const TRAI_CAN_CHAT_KHONG_DEO_TRAY = 1;
    const PHAI_CAN_CHAT_KHONG_DEO_TRAY = 2;
    const THANG_HO_KHONG_DEO_TRAY = 3;
    const TRAI_HO_KHONG_DEO_TRAY = 4;
    const PHAI_HO_KHONG_DEO_TRAY = 5;
    const THANG_HO_DEO_TRAY = 6;
    const TRAI_HO_DEO_TRAY = 7;
    const PHAI_HO_DEO_TRAY = 8;
    const TYPE = [
        self::THANG_CAN_CHAT_KHONG_DEO_TRAY => 'Không đeo tray - Thẳng cắn chặt',
        self::TRAI_CAN_CHAT_KHONG_DEO_TRAY => 'Không đeo tray - Trái cắn chặt',
        self::PHAI_CAN_CHAT_KHONG_DEO_TRAY => 'Không đeo tray - Phải cắn chặt',
        self::THANG_HO_KHONG_DEO_TRAY => 'Không đeo tray - Thẳng hở',
        self::TRAI_HO_KHONG_DEO_TRAY => 'Không đeo tray - Trái hở',
        self::PHAI_HO_KHONG_DEO_TRAY => 'Không đeo tray - Phải hở',
        self::THANG_HO_DEO_TRAY => 'Đeo tray - Thẳng hở',
        self::TRAI_HO_DEO_TRAY => 'Đeo tray - Trái hở',
        self::PHAI_HO_DEO_TRAY => 'Đeo tray - Phải hở',
    ];

    public $pathUpload;

    public $_old_attributes;

    public function init()
    {
        $params = \Yii::$app->params;
        $path = array_key_exists('iway-tray-image', $params) &&
        is_array($params['iway-tray-image']) &&
        array_key_exists('path', $params['iway-tray-image']) ? $params['iway-tray-image']['path']['folder'] : '/uploads';
        if (substr($path, -1) != '/') $path .= '/';
        $this->pathUpload = \Yii::getAlias('@backend/web') . $path;
        if(!is_dir($this->pathUpload)) @mkdir($this->pathUpload, 0775, true);
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function afterFind()
    {
        $this->_old_attributes = $this->getOldAttributes();
        parent::afterFind(); // TODO: Change the autogenerated stub
    }

    public static function tableName()
    {
        return 'iway_tray_images';
    }

    public static function find()
    {
        return new IwayTrayImagesQuery(get_called_class());
    }

    public function afterDelete()
    {
        $cache = Yii::$app->cache;
        $keys = [];
        foreach ($keys as $key) {
            $cache->delete($key);
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        $cache = Yii::$app->cache;
        $keys = [];
        foreach ($keys as $key) {
            $cache->delete($key);
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function getPrevTrayImages()
    {
        return self::find()
            ->where([
                self::tableName() . '.tray_id' => $this->tray_id,
                self::tableName() . '.type' => $this->type
            ])
            ->andWhere(['<>', 'id', $this->primaryKey])
            ->orderBy([self::tableName() . '.created_at' => SORT_DESC])
            ->offset(0)
            ->limit(1)
            ->one();
    }

    public function getTrayHasOne()
    {
        return $this->hasOne(IwayTray::class, ['id' => 'tray_id']);
    }

    public function getImage()
    {
        if ($this->image != null && !is_dir($this->pathUpload . $this->image) && file_exists($this->pathUpload . $this->image)) {
            return Yii::$app->assetManager->publish($this->pathUpload . $this->image)[1];
        }
        return null;
    }
}
