<?php

use yii\db\Migration;

/**
 * Class m200924_104452_modify_table_iway
 */
class m200924_104452_modify_table_iway extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('iway_customer', 'co_so_id', $this->integer(11)->null()->comment('Cơ sở'));
        $this->addColumn('iway_appointment_schedule', 'direct_sales_id', $this->integer(11)->null()->comment('Direct Sale phụ trách'));
        $this->addColumn('iway_appointment_schedule', 'direct_sales_note', $this->text()->null()->comment('Ghi chú của Direct Sale'));
        $this->addColumn('iway_appointment_schedule', 'doctor_thamkham_id', $this->integer(11)->null()->comment('Direct Sale phụ trách'));
        $this->addColumn('iway_appointment_schedule', 'doctor_thamkham_note', $this->text()->null()->comment('Ghi chú của Bác sĩ thăm khám'));

        $this->addForeignKey('fk_iway_appointment_schedule_directs_sale_user', 'iway_appointment_schedule', 'direct_sales_id', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_iway_appointment_schedule_doctor_thamkham_user', 'iway_appointment_schedule', 'doctor_thamkham_id', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->dropForeignKey('fk_iway_customer_directs_sale_user','iway_customer');
        $this->dropColumn('iway_customer' ,'direct_sales_id');
        $this->dropColumn('iway_customer' ,'direct_sales_note');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200924_104452_modify_table_iway cannot be reverted.\n";

        return false;
    }
}
