<?php

namespace modava\iway\models;

use modava\iway\IwayModule;
use modava\iway\models\table\DropdownsConfigTable;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "dropdowns_config".
 *
 * @property int $id
 * @property string $table_name Tên table
 * @property string $field_name Tên field
 * @property array $dropdown_value Danh sách giá trị của field, format: [                  "key_1" => "Value 1",                 "key_2" => "Value 2",                 "key_3" => "Value 3",              ], với key viết bằng ký tự none-unicode nối liền bằng gạch dưới
 */
class DropdownsConfig extends DropdownsConfigTable
{
    public $toastr_key = 'dropdowns-config';

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['table_name', 'field_name',], 'unique', 'targetAttribute' => ['table_name', 'field_name'], 'message' => IwayModule::t('iway', 'Đã tồn tại record chứ tên table và tên field này')],
            [['table_name', 'field_name',], 'required'],
            [['dropdown_value'], 'safe'],
            [['table_name', 'field_name'], 'string', 'max' => 100],
            ['dropdown_value', 'validateDropdownValue']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => IwayModule::t('iway', 'ID'),
            'field_name' => IwayModule::t('iway', 'Tên field'),
            'dropdown_value' => IwayModule::t('iway', 'Danh sách giá trị dropdown'),
            'table_name' => IwayModule::t('iway', 'Tên table'),
        ];
    }

    public static function getAllTables()
    {
        $connection = Yii::$app->db;
        $dbSchema = $connection->getSchema();
        $allTable = $dbSchema->getTableNames();
        return array_combine($allTable, $allTable);
    }

    public static function getAllColumns($tableName)
    {
        if (!$tableName) return [];
        $connection = Yii::$app->db;
        $dbSchema = $connection->getSchema();
        $table = $dbSchema->getTableSchema($tableName);
        $columns = $table->getColumnNames();
        return array_combine($columns, $columns);
    }

    public static function getDropdowns($tableName)
    {
        if (!$tableName) return null;

        $cache = \Yii::$app->cache;
        $cacheKey = self::$CACHE_PREFIX . "-$tableName";

        if ($cache->exists($cacheKey)) return $cache->get($cacheKey);

        $dropdownsResult = self::find()->where(['=', 'table_name', $tableName])->all();

        if (!$dropdownsResult) return null;

        $dropdowns = [];

        foreach ($dropdownsResult as $model) {
            foreach ($model->dropdown_value as $v) {
                $dropdowns[$model->field_name][$v['key']] = $v['value'];
            }
        }

        $cache->set($cacheKey, $dropdowns);

        return $dropdowns;
    }

    public static function getDropdown($tableName, $fieldName)
    {
        if (!$fieldName || !$tableName) return null;

        $dropdowns = self::getDropdowns($tableName);

        return $dropdowns[$fieldName];
    }

    public static function getDisplayDropdown($value, $fieldName, $tableName) {
        $dropDown = self::getDropdown($tableName, $fieldName);
        if ($dropDown === null) return null;
        if (array_key_exists($value, $dropDown)) {
            return $dropDown[$value];
        }
        return null;
    }

    public function validateDropdownValue()
    {
        if (!$this->hasErrors() && is_array($this->dropdown_value)) {
            $duplicateTable = [];

            foreach ($this->dropdown_value as $i => $dropdownValue) {
                // Check required
                if (!$dropdownValue['key']) $this->addError("dropdown_value[$i][key]", IwayModule::t('iway', 'Vui lòng nhập'));
                if (!$dropdownValue['value']) $this->addError("dropdown_value[$i][value]", IwayModule::t('iway', 'Vui lòng nhập'));

                // Check Duplicate
                if (array_key_exists($dropdownValue['key'], $duplicateTable)) {
                    $this->addError("dropdown_value[$i][key]", IwayModule::t('iway', '{key} đã tồn tại', ['key' => $dropdownValue['key']]));
                } else {
                    $duplicateTable[$dropdownValue['key']] = $i;
                }
            }
        }
    }
}
