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
            [['field_name', 'table_name'], 'required'],
            [['dropdown_value'], 'safe'],
            [['field_name'], 'string', 'max' => 100],
            [['field_name'], 'unique'],
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
        $allTableCombined = array_combine($allTable, $allTable);
        return $allTableCombined;
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
}
