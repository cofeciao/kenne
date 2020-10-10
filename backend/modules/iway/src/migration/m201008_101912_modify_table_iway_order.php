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
        /*$this->addColumn('iway_order', 'discount_type', $this->smallInteger(1)->null()->comment('Loại giảm giá'));
        $this->addColumn('iway_order', 'discount_value', $this->decimal(15)->null()->comment('Giá trị giảm giá'));
        $this->addColumn('iway_order', 'received', $this->decimal(15)->notNull()->defaultValue(0)->comment('Số tiền đã thu'));*/
        $this->addColumn('iway_order', 'balance', $this->decimal(15)->notNull()->defaultValue(0)->comment('Số tiền còn lại'));
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
