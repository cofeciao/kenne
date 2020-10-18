<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m200813_075641_create_orders_table extends Migration
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
}
