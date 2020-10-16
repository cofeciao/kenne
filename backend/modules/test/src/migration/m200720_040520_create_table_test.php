<?php

use yii\db\Migration;

/**
 * Class m200720_040520_create_table_test
 */
class m200720_040520_create_table_test extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200720_040520_create_table_test cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200720_040520_create_table_test cannot be reverted.\n";

        return false;
    }
    */
}
