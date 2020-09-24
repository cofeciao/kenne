<?php

use yii\db\Migration;

/**
 * Class m200924_104452_modify_table_iway_customer
 */
class m200924_104452_modify_table_iway_customer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('iway_customer', 'co_so_id', $this->integer(11)->null()->comment('Cơ sở'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200924_104452_modify_table_iway_customer cannot be reverted.\n";

        return false;
    }
}
