<?php

use yii\db\Migration;

/**
 * Class m200808_033802_create_table_slide_categoy
 */
class m200808_033802_create_table_slide_categoy extends Migration
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

        $this->createTable('{{%slide_category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'slug' => $this->string(255)->notNull()->unique(),
            'image' => $this->string(255)->null(),
            'description' => $this->text()->null(),
            'position' => $this->integer(11)->null(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
            'language' => $this->string(25)->null(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'created_by' => $this->integer(11)->null(),
            'updated_by' => $this->integer(11)->null(),
        ], $tableOptions);

        $this->createIndex('index-slug', 'slide_category', 'slug');
        $this->createIndex('index-language', 'slide_category', 'language');
        $this->addForeignKey('fk-slide_category-created_by-user-id', 'slide_category', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-slide_category-updated_by-user-id', 'slide_category', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%slide_category}}');
    }
}
