<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%account}}`.
 */
class m200807_071912_create_account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%account}}',[
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull()->unique(),
            'password' => $this->integer(10)->notNull(),
            'confirm_password' => $this->integer(10)->notNull(),
            'auth_key' => $this->string(32)->null(),
            'access_token' => $this->string()->unique()->null(),
            'first_name' => $this->string(20)->notNull(),
            'last_name' => $this->string(20)->notNull(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ],$tableOptions);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%account}}');
    }
}
