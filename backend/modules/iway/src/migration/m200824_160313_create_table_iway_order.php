<?php

use yii\db\Migration;

/**
 * Class m200824_160313_create_table_iway_order
 */
class m200824_160313_create_table_iway_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_customer_order = Yii::$app->db->getTableSchema('iway_order');
        if ($check_customer_order === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_order', [
                'id' => $this->primaryKey(),
                'code' => $this->string(100)->null()->comment('Mã đơn hàng'),
                'ordered_at' => $this->integer(11)->null()->comment('Ngày lập đơn'),
                'customer_id' => $this->integer(11)->notNull()->comment('Mã khách hàng'),
                'status' => $this->string()->null()->comment('Tình trạng đơn hàng'),
                'co_so' => $this->integer(11)->null()->comment('Đơn hàng lập ở cơ sở nào'),
                'total' => $this->double('16,2')->null()->defaultValue(0)->comment('Tổng tiền'),
                'discount' => $this->double('16,2')->null()->defaultValue(0)->comment('Chiết khấu'),
                'created_at' => $this->integer(11)->null()->comment('Ngày nhập đơn vào hệ thống'),
                'updated_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_by' => $this->integer(11)->null()->defaultValue(1),
            ], $tableOptions);
            $this->createIndex('index-code', 'iway_order', 'code');
            $this->addForeignKey('fk_iway_order_customer_id_customer', 'iway_order', 'customer_id', 'iway_customer', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_order_co_so_iway_co_so_id', 'iway_order', 'co_so', 'iway_co_so', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_order_created_by_user', 'iway_order', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_order_updated_by_user', 'iway_order', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200824_160313_create_table_iway_order cannot be reverted.\n";

        return false;
    }
}
