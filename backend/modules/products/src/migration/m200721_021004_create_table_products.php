<?php

use yii\db\Migration;

/**
 * Class m200721_021004_create_table_products
 */
class m200721_021004_create_table_products extends Migration
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
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'pro_name' => $this->string(255)->notNull(),
            'pro_slug' => $this->string(255)->notNull()->unique(),
            'pro_description' => $this->string(255)->null(),
            'pro_quantity' => $this->integer(11)->defaultValue(0),
            'pro_price' => $this->integer(11)->null(),
            'pro_image'=> $this->string(255)->notNull()->defaultValue('no-image.png'),
            'pro_status'=> $this->tinyInteger(1)->notNull()->defaultValue(1),
            'pro_sale'=>$this->tinyInteger(4)->notNull()->defaultValue('0'),
            'created_at'=>$this->integer(11)->notNull(),
            'updated_at'=>$this->integer(11)->notNull(),
        ],$tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200721_021004_create_table_products cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200721_021004_create_table_products cannot be reverted.\n";

        return false;
    }
    */
}
