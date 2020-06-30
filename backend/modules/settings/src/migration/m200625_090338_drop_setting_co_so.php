<?php

use yii\db\Migration;

/**
 * Class m200625_090338_drop_setting_co_so
 */
class m200625_090338_drop_setting_co_so extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table = Yii::$app->db->getTableSchema('setting_co_so');
        if ($check_table === null) {
            $this->dropTable('setting_co_so');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200625_090338_drop_setting_co_so cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200625_090338_drop_setting_co_so cannot be reverted.\n";

        return false;
    }
    */
}
