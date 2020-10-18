<?php

use yii\db\Migration;

/**
 * Class m200721_035603_create_table_transactions
 */
class m200721_035603_create_table_transactions extends Migration
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
        $this->addForeignKey('fk_transactions_customer','transactions','tr_id_customer','customer','id','RESTRICT','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%transactions}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200721_035603_create_table_transactions cannot be reverted.\n";

        return false;
    }
    */
}
