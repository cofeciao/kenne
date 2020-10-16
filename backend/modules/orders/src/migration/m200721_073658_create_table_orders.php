<?php

use yii\db\Migration;

/**
 * Class m200721_070827_create_table_orders
 */
class m200721_070827_create_table_orders extends Migration
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
        $this->createTable('{{%orders}}',[
            'id' => $this->primaryKey(),
            'id_tr'=>$this->integer(11)->notNull(),
            'id_pro'=> $this->integer(11)->notNull(),
            'or_quantity'=>$this->integer(11)->notNull(),
            'or_price'=>$this->integer(11)->notNull()
        ],$tableOptions);
        $this->addForeignKey('fk_transactions_id','orders','id_tr','transactions','id','RESTRICT','CASCADE');
        $this->addForeignKey('fk_products_id','orders','id_pro','products','id','RESTRICT','CASCADE');
        $this->addCommentOnColumn('orders','or_quantity','số lượng mua');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200721_070827_create_table_orders cannot be reverted.\n";

        return false;
    }
    */
}
