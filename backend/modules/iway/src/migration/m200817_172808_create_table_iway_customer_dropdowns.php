<?php

use yii\db\Migration;

/**
 * Class m200817_172808_create_table_iway_customer_dropdowns
 *
 *      Author: Đức Huỳnh
 *      Date    2020-08-18
 *
 * - Table dùng để chứa các giá trị của field dropdowns của table customer
 * - Table được thiết kế để scale chiều dọc (insert các row cho các field mới)
 * - Khi tạo 1 field có dạng dropdown, thì insert vào bảng này 1 record với câu lệnh:
 *   + $this->execute('insert into iway_customer_dropdowns (field_name) value (<field_name>)');
 */
class m200817_172808_create_table_iway_customer_dropdowns extends Migration
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

        $this->createTable('{{%iway_customer_dropdowns}}', [
            'id' => $this->primaryKey(),
            'field_name' => $this->string('100')->notNull()->unique()->comment('Tên field'),
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
        $this->dropTable('{{%iway_customer_dropdowns}}');
    }
}
