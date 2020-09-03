<?php

use yii\db\Migration;

/**
 * Class m200903_030004_modiy_table_affiliate_order
 */
class m200903_030004_modiy_table_affiliate_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('affiliate_order', 'other_discount', $this->decimal(11)->defaultValue(0)->comment('Các khuyến mãi khác'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200903_030004_modiy_table_affiliate_order cannot be reverted.\n";

        return false;
    }
}
