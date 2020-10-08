<?php

use yii\db\Migration;

/**
 * Class m201007_030124_create_table_iway_order
 */
class m201007_030124_create_table_iway_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table_customer = Yii::$app->db->getTableSchema('iway_order');
        if ($check_table_customer === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_order', [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull(),
                'code' => $this->string()->null()->comment('Mã đơn hàng'),
                'co_so_id' => $this->integer(11)->notNull()->comment('Cơ sở'),
                'customer_id' => $this->integer(11)->notNull()->comment('Khách hàng'),
                'order_date' => $this->date()->notNull()->comment('Ngày đơn hàng'),
                'status' => $this->string(50)->comment('Tình trạng đơn hàng'),
                'payment_status' => $this->string(50)->comment('Tình trạng thanh toán'),
                'service_status' => $this->string(50)->comment('Tình trạng dịch vụ'),
                'total' => $this->decimal(12)->comment('Tổng tiền (trước chiết khấu)'),
                'discount' => $this->decimal()->defaultValue(0)->comment('Giảm giá'),
                'final_total' => $this->decimal(12)->comment('Tổng tiền'),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null(),
            ], $tableOptions);

            $this->addForeignKey('fk_iway_order_created_by_user', 'iway_order', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_order_updated_by_user', 'iway_order', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_order_customer_id_customer_id', 'iway_order', 'customer_id', 'iway_customer', 'id', 'RESTRICT', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201007_030124_create_table_iway_order cannot be reverted.\n";

        return false;
    }

}
