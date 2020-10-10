<?php

use yii\db\Migration;

/**
 * Class m201010_021337_create_table_iway_receipt
 */
class m201010_021337_create_table_iway_receipt extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table_customer = Yii::$app->db->getTableSchema('iway_receipt');
        if ($check_table_customer === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_receipt', [
                'id' => $this->primaryKey(),
                'title' => $this->string(255)->notNull()->comment('Tiêu đề'),
                'status' => $this->string(50)->notNull()->comment('Tình trạng'),
                'receipt_date' => $this->dateTime()->notNull()->comment('Ngày thu'),
                'amount' => $this->decimal(15)->notNull()->defaultValue(0)->comment('Số tiền'),
                'description' => $this->text()->null()->comment('Mô tả'),
                'order_id' => $this->integer(11)->null()->comment('Đơn hàng'),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null(),
            ], $tableOptions);

            $this->addForeignKey('fk_iway_receipt_created_by_user', 'iway_receipt', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_receipt_updated_by_user', 'iway_receipt', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_receipt_order_id_order_id', 'iway_receipt', 'order_id', 'iway_order', 'id', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201010_021337_create_table_iway_receipt cannot be reverted.\n";

        return false;
    }

}
