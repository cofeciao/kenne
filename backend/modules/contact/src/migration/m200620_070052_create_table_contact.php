<?php

use yii\db\Migration;

/**
 * Class m200620_070052_create_table_contact
 */
class m200620_070052_create_table_contact extends Migration
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

        $this->createTable('{{%contact}}', [
            'id' => $this->primaryKey(),
            'fullname' => $this->string(255)->notNull(),
            'phone' => $this->string(25)->notNull()->unique(),
            'email' => $this->string(255)->null()->unique(),
            'address' => $this->string(255)->null(),
            'title' => $this->string(255)->null(),
            'content' => $this->text()->null(),
            'ip_address' => $this->string(25)->null(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
            'created_at' => $this->integer(11)->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact}}');
    }

}
