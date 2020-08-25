<?php

use yii\db\Migration;

/**
 * Class m200824_160625_create_table_iway_product_category
 */
class m200824_160625_create_table_iway_product_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table = Yii::$app->db->getTableSchema('iway_product_category');
        if ($check_table === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_product_category', [
                'id' => $this->primaryKey(),
                'name' => $this->string(255)->notNull(),
                'description' => $this->string(255)->null()->comment('Mô tả danh mục'),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1)->comment('0: disabled, 1: published'),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null()->defaultValue(1)
            ], $tableOptions);
            $this->addColumn('iway_product_category', 'language', "ENUM('vi', 'en', 'jp') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi' COMMENT 'Language' AFTER `status`");
            $this->createIndex('index-language', 'iway_product_category', 'language');
            $this->addForeignKey('fk_iway_product_category_created_by_user', 'iway_product_category', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_iway_product_category_updated_by_user', 'iway_product_category', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200824_160625_create_table_iway_product_category cannot be reverted.\n";

        return false;
    }
}
