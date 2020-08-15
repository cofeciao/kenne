<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transactions}}`.
 */
class m200813_075627_create_transactions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%transactions}}',[
            'id' => $this->primaryKey(),
            'tr_id_customer'=>$this->integer(11)->notNull(),
            'tr_name'=>$this->string(255)->notNull(),
            'tr_address'=>$this->string(255)->notNull(),
            'tr_phone'=>$this->integer(10)->notNull(),
            'tr_status'=>$this->tinyInteger(1)->notNull()->defaultValue(1),
            'tr_total' => $this->integer(11)->notNull()->defaultValue(0),
            'created_at' =>  $this->integer(11)->null(),
            'updated_at' =>  $this->integer(11)->null(),
        ],$tableOptions);
        $this->addForeignKey('fk_transactions_account','transactions','tr_id_customer','account','id','RESTRICT','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%transactions}}');
    }
}
