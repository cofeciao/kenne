<?php

use yii\db\Migration;

/**
 * Class m201009_013419_create_table_iway_order_detail_detail
 */
class m201009_013419_create_table_iway_order_detail extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table_customer = Yii::$app->db->getTableSchema('iway_order_detail');
        if ($check_table_customer === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_order_detail', [
                'id' => $this->primaryKey(),
                'product_id' => $this->integer(11)->notNull()->comment('Sản phẩm'),
                'order_id' => $this->integer(11)->notNull()->comment('Đơn hàng'),
                'qty' => $this->integer(11)->notNull()->comment('Số lượng'),
                'price' => $this->decimal(15)->null()->defaultValue(0)->comment('Giá'),
                'discount_type' => $this->smallInteger(1)->comment('1. Giảm giá trực tiếp, 2 Giảm theo %'),
                'discount_value' => $this->decimal(15)->notNull()->defaultValue(0)->comment('Giá trị giảm giá'),
                'discount' => $this->decimal(15)->notNull()->defaultValue(0)->comment('Giá trị giảm giá, được tính từ discount_type discount_value'),
                'description' => $this->string(255)->null()->comment('Mô tả'),
                'total' => $this->decimal(15)->notNull()->defaultValue(0)->comment('Tổng cộng'),
                'final_total' => $this->decimal(15)->notNull()->defaultValue(0)->comment('Tổng cộng'),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null(),
            ], $tableOptions);

            $this->addForeignKey('fk_iway_order_detail_created_by_user', 'iway_order_detail', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_order_detail_updated_by_user', 'iway_order_detail', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_order_detail_product_id_product_id', 'iway_order_detail', 'product_id', 'product', 'id', 'RESTRICT');
            $this->addForeignKey('fk_iway_order_detail_order_id_order_id', 'iway_order_detail', 'order_id', 'iway_order', 'id', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201009_013419_create_table_iway_order_detail_detail cannot be reverted.\n";

        return false;
    }
}
