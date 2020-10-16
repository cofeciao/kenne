<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%logo}}`.
 */
class m200803_034806_create_logo_table extends Migration
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
        $this->createTable('{{%logo}}',[
            'id' => $this->primaryKey(),
            'logo'=>$this->string()->notNull(),
            'status'=> $this->smallInteger(1)->notNull()->defaultValue(0),
            'link_logo'=> $this->string(),
            'title'=>$this->string(),
        ],$tableOptions);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%logo}}');
    }
}
