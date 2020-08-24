<?php

use yii\db\Migration;

/**
 * Class m200824_161024_create_table_iway_customer_product
 */
class m200824_161024_create_table_iway_customer_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table = Yii::$app->db->getTableSchema('iway_customer_product');
        if ($check_table === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_customer_product', [
                'id' => $this->primaryKey(),
                'category_id' => $this->integer(11)->notNull(),
                'name' => $this->string(255)->notNull(),
                'price' => $this->double('16,2')->null()->defaultValue(0)->comment('Đơn giá'),
                'description' => $this->string(255)->null()->comment('Mô tả sản phẩm'),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1)->comment('0: disabled, 1: published'),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null()->defaultValue(1)
            ], $tableOptions);
            $this->addColumn('iway_customer_product', 'language', "ENUM('vi', 'en', 'jp') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi' COMMENT 'Language' AFTER `status`");
            $this->createIndex('index-language', 'iway_customer_product', 'language');
            $this->addForeignKey('fk_iway_customer_product_category_id_customer_product_category', 'iway_customer_product', 'category_id', 'iway_customer_product_category', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_customer_product_created_by_user', 'iway_customer_product', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_customer_product_updated_by_user', 'iway_customer_product', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200824_161024_create_table_iway_customer_product cannot be reverted.\n";

        return false;
    }
}
