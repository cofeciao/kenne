<?php

use yii\db\Migration;

/**
 * Class m200722_071734_alter_column_created_at_on_table_products
 */
class m200722_071734_alter_column_created_at_on_table_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('products','created_at','datetime');
        $this->alterColumn('products','updated_at','datetime');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('products','created_at');
        $this->dropColumn('products','updated_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200722_071734_alter_column_created_at_on_table_products cannot be reverted.\n";

        return false;
    }
    */
}
