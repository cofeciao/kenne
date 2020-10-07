<?php

use yii\db\Migration;

/**
 * Class m201007_021908_create_table_iway_product
 */
class m201007_021908_create_table_iway_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        /* check table exists */
        $check_table_customer = Yii::$app->db->getTableSchema('iway_product');
        if ($check_table_customer === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_product', [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull(),
                'status' => $this->smallInteger(1)->comment('Tình trạng: Hoạt động, Không hoạt động'),
                'price' => $this->decimal(11)->notNull()->defaultValue(0)->comment('Giá'),
                'description' => $this->text()->null()->comment('Mô tả'),
                'img_links' => $this->text()->null()->comment('Danh sách hình ảnh'),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null(),
            ], $tableOptions);

            $this->addForeignKey('fk_iway_product_created_by_user', 'iway_product', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_product_updated_by_user', 'iway_product', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201007_021908_create_table_iway_product cannot be reverted.\n";

        return false;
    }
}
