<?php

namespace modava\iway\components;

use modava\iway\helpers\Utils;
use modava\iway\models\DropdownsConfig;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\helpers\Url;


/**
 * Class MyIwayModel
 * @package modava\iway\components
 * Các Model các cần extend từ model này để có thể lấy được danh sách dropdown của model đó
 *
 * Implement by Đức Huỳnh
 * Date:    2020-08-19
 */
class MyIwayModel extends ActiveRecord
{
    protected $numberFields = [];

    public function init()
    {
        $this->loadDataFormUrlWhenCreate();
        parent::init();
    }

    public function loadDataFormUrlWhenCreate()
    {
        if (!$this->primaryKey) {
            $this->load(Yii::$app->request->get());
        }
    }

    public function convertToDisplayNumber()
    {
        foreach ($this->numberFields as $field) {
            $this->$field = $this->$field === null ? 0 : Yii::$app->formatter->asDecimal($this->$field);
        }
    }

    public function getDropdowns()
    {
        return DropdownsConfig::getDropdowns(get_class($this)::tableName());
    }

    public function getDropdown($fieldName)
    {
        if (!$fieldName) return null;

        $dropdowns = $this->getDropdowns();

        return isset($dropdowns[$fieldName]) ? $dropdowns[$fieldName] : null;
    }

    public function getDisplayDropdown($value, $fieldName)
    {
        $dropDown = $this->getDropdown($fieldName);
        if ($dropDown === null) return null;
        if (array_key_exists($value, $dropDown)) {
            return $dropDown[$value];
        }
        return null;
    }

    public function getDisplayRelatedField($fieldName, $hasOneName, $controllerId, $showField = 'title', $options = [])
    {
        if (!$this->$fieldName) return null;
        return Html::a($this->$hasOneName->$showField, Url::toRoute(["{$controllerId}/view", 'id' => $this->$fieldName]), $options);
    }

    public function getPhone()
    {
        $content = '';
        if (class_exists('modava\voip24h\CallCenter')) $content .= Html::a('<i class="fa fa-phone"></i>', 'javascript: void(0)', [
            'class' => 'btn btn-xs btn-success call-to',
            'title' => 'Gọi',
            'data-uri' => $this->phone
        ]);
        $content .= Html::a('<i class="fa fa-paste"></i>', 'javascript: void(0)', [
            'class' => 'btn btn-xs btn-info copy ml-1',
            'title' => 'Copy',
            'data-copy' => $this->phone
        ]);
        return $content;
    }

    public function beforeValidate()
    {
        foreach ($this->numberFields as $field) {
            $this->$field = Utils::convertToRawNumber($this->$field);
        }

        return parent::beforeValidate();
    }

    public static function getByKeyWord($keyWord)
    {
        $sql = 'SELECT `id`, title AS `text` FROM ' . static::tableName() . ' WHERE title LIKE :q';

        $data = Yii::$app->db->createCommand($sql, [':q' => "%{$keyWord}%"])->queryAll();

        return [
            'results' => $data
        ];
    }

    public function transformValueForRecord()
    {
        $this->convertToDisplayNumber();
    }

    public function loadWithoutPrefix($params)
    {
        $formName = $this->formName();
        $paramsPrepare = [];

        foreach ($params as $k => $v) {
            $paramsPrepare[$formName][$k] = $v;
        }

        return $this->load($paramsPrepare);
    }
}
