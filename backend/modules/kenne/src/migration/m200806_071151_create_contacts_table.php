<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contacts}}`.
 */
class m200806_071151_create_contacts_table extends Migration
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
        $this->createTable('{{%contacts}}', [
            'id' => $this->primaryKey(),
            'con_name' => $this->string(35)->notNull(),
            'con_email' => $this->string(255),
            'con_subject' => $this->string(255),
            'con_content' => $this->string(255),
            'con_status' => $this->tinyInteger(1)->defaultValue(1),
            'created_at' => $this->integer(11)
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contacts}}');
    }
}
