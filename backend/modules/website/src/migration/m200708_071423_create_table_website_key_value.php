<?php

use yii\db\Migration;

/**
 * Class m200708_071423_create_table_website_key_value
 */
class m200708_071423_create_table_website_key_value extends Migration
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

        $this->createTable('{{%website_key_value}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'key' => $this->string(25)->null(),
            'value' => $this->string(255)->notNull(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
            'created_at' => $this->integer(11)->null(),
            'updated_at' => $this->integer(11)->null(),
            'created_by' => $this->integer(11)->null(),
            'updated_by' => $this->integer(11)->null(),
        ], $tableOptions);

        $this->addColumn('website_key_value', 'language', "ENUM('vi', 'en', 'jp') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi' COMMENT 'Language' AFTER `status`");
        $this->createIndex('key', 'website_key_value', 'key');
        $this->addForeignKey('fk_website_key_value_created_user', 'website_key_value', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_website_key_value_updated_user', 'website_key_value', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%website_key_value}}');
    }
}
