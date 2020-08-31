<?php

use yii\db\Migration;

/**
 * Class m200817_172808_create_table_dropdowns_config
 *
 *      Author: Đức Huỳnh
 *      Date    2020-08-18
 *
 * - Table dùng để chứa các giá trị của field dropdowns của các table
 * - Table được thiết kế để scale chiều dọc (insert các row cho các field mới)
 * - Khi tạo 1 field có dạng dropdown, thì insert vào bảng này 1 record với câu lệnh:
 *   + $this->execute('insert into dropdowns_config (table_name, field_name) value (<tablename>, <field_name>)');
 */
class m200817_172808_create_table_dropdowns_config extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%dropdowns_config}}', [
            'id' => $this->primaryKey(),
            'table_name' => $this->string(100)->notNull()->comment('Tên table'),
            'field_name' => $this->string(100)->notNull()->comment('Tên field'),
            'dropdown_value' => $this->json()->comment('Danh sách giá trị của field, format: [ 
                "key_1" => "Value 1",
                "key_2" => "Value 2",
                "key_3" => "Value 3",
             ], với key viết bằng ký tự none-unicode nối liền bằng gạch dưới '),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dropdowns_config}}');
    }
}
