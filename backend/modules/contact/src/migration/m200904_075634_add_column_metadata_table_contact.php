<?php

use yii\db\Migration;

/**
 * Class m200904_075634_add_column_metadata_table_contact
 */
class m200904_075634_add_column_metadata_table_contact extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check column exists */
        $check_column = Yii::$app->db->getTableSchema('contact')->columns;
        if (!array_key_exists('metadata', $check_column)) {
            $this->addColumn('contact', 'metadata', $this->json()->null());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200904_075634_add_column_metadata_table_contact cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200904_075634_add_column_metadata_table_contact cannot be reverted.\n";

        return false;
    }
    */
}
