<?php

use yii\db\Migration;

/**
 * Class m200808_033807_create_table_slide
 */
class m200808_033807_create_table_slide extends Migration
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

        $this->createTable('{{%slide}}', [
            'id' => $this->primaryKey(),
            'slide_type' => $this->integer(11)->null(),
            'slide_category' => $this->integer(11)->null(),
            'title' => $this->string(255)->notNull(),
            'slug' => $this->string(255)->notNull()->unique(),
            'image' => $this->string(255)->null(),
            'link' => $this->string(255)->null(),
            'description' => $this->text()->null(),
            'position' => $this->integer(11)->null(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
            'language' => $this->string(25)->null(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'created_by' => $this->integer(11)->null(),
            'updated_by' => $this->integer(11)->null(),
        ], $tableOptions);

        $this->createIndex('index-slug', 'slide', 'slug');
        $this->createIndex('index-language', 'slide', 'language');
        $this->addForeignKey('fk-slide-created_by-user-id', 'slide', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-slide-updated_by-user-id', 'slide', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-slide-slide_type-slide_type-id', 'slide', 'slide_type', 'slide_type', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-slide-slide_category-slide_category-id', 'slide', 'slide_category', 'slide_category', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%slide}}');
    }
}
