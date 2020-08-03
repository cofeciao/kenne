<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%account}}`.
 */
class m200803_075544_create_account_table extends Migration
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
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'oauth_client' => $this->string()->null(),
            'oauth_client_user_id' => $this->string()->null(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'logged_at' => $this->dateTime()->null(),
            'created_by' => $this->smallInteger()->null(),
            'updated_by' => $this->smallInteger()->null(),
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
