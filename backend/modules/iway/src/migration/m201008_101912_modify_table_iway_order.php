<?php

use yii\db\Migration;

/**
 * Class m201008_101912_modify_table_iway_order
 */
class m201008_101912_modify_table_iway_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('iway_order', 'discount_type', $this->string(20)->null()->comment('Loại giảm giá'));
        $this->addColumn('iway_order', 'discount_value', $this->decimal(12)->null()->comment('Giá trị giảm giá'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201008_101912_modify_table_iway_order cannot be reverted.\n";

        return false;
    }
}
