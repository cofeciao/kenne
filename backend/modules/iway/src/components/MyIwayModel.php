<?php

namespace modava\iway\components;

use modava\iway\helpers\Utils;
use modava\iway\models\DropdownsConfig;
use yii\db\ActiveRecord;
use yii\helpers\Html;


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

    public function getDropdowns()
    {
        return DropdownsConfig::getDropdowns(get_class($this)::tableName());
    }

    public function getDropdown($fieldName) {
        if (!$fieldName) return null;

        $dropdowns = $this->getDropdowns();

        return isset($dropdowns[$fieldName]) ? $dropdowns[$fieldName] : null;
    }

    public function getDisplayDropdown($value, $fieldName) {
        $dropDown = $this->getDropdown($fieldName);
        if ($dropDown === null) return null;
        if (array_key_exists($value, $dropDown)) {
            return $dropDown[$value];
        }
        return null;
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
}
