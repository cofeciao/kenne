<?php

namespace modava\iway\models;

use modava\iway\IwayModule;
use modava\iway\models\table\CustomerDropdownsTable;
use Yii;

/**
 * This is the model class for table "iway_customer_dropdowns".
 *
 * @property int $id
 * @property string $field_name Tên field
 * @property array $dropdown_value Danh sách giá trị của field, format: [                  "key_1" => "Value 1",                 "key_2" => "Value 2",                 "key_3" => "Value 3",              ], với key viết bằng ký tự none-unicode nối liền bằng gạch dưới
 */
class CustomerDropdowns extends CustomerDropdownsTable
{
    public $toastr_key = 'customer-dropdowns';

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
            [['field_name'], 'required'],
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
            'id' => IwayModule::t('app', 'ID'),
            'field_name' => IwayModule::t('app', 'Tên field'),
            'dropdown_value' => IwayModule::t('app', 'Danh sách giá trị dropdown'),
        ];
    }
}
