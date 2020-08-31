<?php

use yii\db\Migration;

/**
 * Class m200825_163251_create_table_iway_payment
 */
class m200825_163251_create_table_iway_payment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_iway_payment = Yii::$app->db->getTableSchema('iway_payment');
        if ($check_iway_payment === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_payment', [
                'id' => $this->primaryKey(),
                'customer' => $this->integer(11)->notNull(),
                'order_id' => $this->integer(11)->notNull(),
                'price' => $this->double('16,2')->null()->defaultValue(0)->comment('Tiền thanh toán'),
                'type' => $this->string()->notNull()->comment('"Loại thanh toán: 0: Thanh toán, 1: Đặt cọc, ..."'),
                'method' => $this->string()->notNull()->comment('"Hình thức thanh toán: Tiền mặt, Chuyển khoản, ..."'),
                'co_so' => $this->integer(11)->null()->comment('Thanh toán lập ở cơ sở nào'),
                'payment_at' => $this->integer(11)->null()->comment('Ngày thanh toán'),
                'created_at' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_by' => $this->integer(11)->null()->defaultValue(1),
            ], $tableOptions);
            $this->addForeignKey('fk_iway_payment_order_id_iway_order_id', 'iway_payment', 'order_id', 'iway_order', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_payment_customer_id_iway_customer_id', 'iway_payment', 'customer_id', 'iway_customer', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_payment_co_so_iway_co_so', 'iway_payment', 'co_so', 'iway_co_so', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_payment_created_by_user', 'iway_payment', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_payment_updated_by_user', 'iway_payment', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200825_163251_create_table_iway_payment cannot be reverted.\n";

        return false;
    }
}
