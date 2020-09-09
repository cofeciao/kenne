<?php

use yii\db\Migration;

/**
 * Class m200909_083950_modify_table_affiliate_order
 */
class m200909_083950_modify_table_affiliate_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('affiliate_order', 'commision_for_coupon_owner', $this->decimal(11)->defaultValue(0)->comment('Hoa hồng cho chủ coupon'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200909_083950_modify_table_affiliate_order cannot be reverted.\n";

        return false;
    }
}
