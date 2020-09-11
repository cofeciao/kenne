<?php

namespace modava\iway\components;

use modava\iway\models\DropdownsConfig;
use yii\db\ActiveRecord;


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
}
