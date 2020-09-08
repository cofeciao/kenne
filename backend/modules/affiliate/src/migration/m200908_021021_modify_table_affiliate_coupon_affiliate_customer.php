<?php

use yii\db\Migration;

/**
 * Class m200908_021021_modify_table_affiliate_coupon_affiliate_customer
 */
class m200908_021021_modify_table_affiliate_coupon_affiliate_customer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Table Coupon
        $this->addColumn('affiliate_coupon', 'count_sms_sent', $this->smallInteger(1)->defaultValue(0)->comment('Số SMS đã gửi cho KH'));

        // Table Customer
        $this->addColumn('affiliate_customer', 'total_commission', $this->decimal(15)->defaultValue(0)->comment('Số tiền hoa hồng của KH'));
        $this->addColumn('affiliate_customer', 'total_commission_paid', $this->decimal(15)->defaultValue(0)->comment('Số tiền hoa hồng đã trả cho KH'));
        $this->addColumn('affiliate_customer', 'total_commission_remain', $this->decimal(15)->defaultValue(0)->comment('Số tiền hoa hồng đã còn lại'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200908_021021_modify_affiliate_coupon cannot be reverted.\n";

        return false;
    }
}
