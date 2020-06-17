<?php

use yii\db\Migration;

/**
 * Class m200617_084122_create_table_customer_order
 */
class m200617_084122_create_table_customer_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_customer_payment_type = Yii::$app->db->getTableSchema('customer_payment_type');
        if ($check_customer_payment_type === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('customer_payment_type', [
                'id' => $this->primaryKey(),
                'customer_id' => $this->integer(11)->notNull()->comment('Mã khách hàng'),
                'code' => $this->string(100)->null()->comment('Mã đơn hàng'),
                'total' => $this->double('16,2')->null()->defaultValue(0)->comment('Tổng tiền'),
                'discount' => $this->double('16,2')->null()->defaultValue(0)->comment('Chiết khấu'),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1),
                'co_so' => $this->integer(11)->notNull()->comment('Đơn hàng lập ở cơ sở nào'),
                'ordered_at' => $this->integer(11)->null()->comment('Ngày lập đơn'),
                'created_at' => $this->integer(11)->null()->comment('Ngày nhập đơn vào hệ thống'),
                'updated_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_by' => $this->integer(11)->null()->defaultValue(1),
            ], $tableOptions);
            $this->addColumn('customer_payment_type', 'language', "ENUM('vi', 'en', 'jp') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi' COMMENT 'Language' AFTER `status`");
            $this->createIndex('index-language', 'customer_payment_type', 'language');
            $this->createIndex('index-code', 'customer_payment_type', 'code');
            $this->addForeignKey('fk_customer_payment_type_customer_id_customer', 'customer_payment_type', 'customer_id', 'customer', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_customer_payment_type_co_so_setting_co_so', 'customer_payment_type', 'co_so', 'setting_co_so', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_customer_payment_type_created_by_user', 'customer_payment_type', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_customer_payment_type_updated_by_user', 'customer_payment_type', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200617_084122_create_table_customer_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200617_084122_create_table_customer_order cannot be reverted.\n";

        return false;
    }
    */
}
