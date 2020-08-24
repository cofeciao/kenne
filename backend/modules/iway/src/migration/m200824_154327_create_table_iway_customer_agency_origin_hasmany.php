<?php

use yii\db\Migration;

/**
 * Class m200824_154327_create_table_iway_customer_agency_origin_hasmany
 */
class m200824_154327_create_table_iway_customer_agency_origin_hasmany extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $check_iway_customer_agency_origin_hasmany = Yii::$app->db->getTableSchema('iway_customer_agency_origin_hasmany');
        if ($check_iway_customer_agency_origin_hasmany === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('iway_customer_agency_origin_hasmany', [
                'agency_id' => $this->integer(11)->notNull(),
                'origin_id' => $this->integer(11)->notNull()
            ], $tableOptions);
            $this->addPrimaryKey('pk_iway_agency_origin_hasmany', 'iway_customer_agency_origin_hasmany', ['agency_id', 'origin_id']);
            $this->addForeignKey('fk_iway_customer_agency_origin_hasmany_agency_id', 'iway_customer_agency_origin_hasmany', 'agency_id', 'iway_customer_agency', 'id', 'CASCADE', 'CASCADE');
            $this->addForeignKey('fk_iway_customer_agency_origin_hasmany_origin_id', 'iway_customer_agency_origin_hasmany', 'origin_id', 'iway_customer_origin', 'id', 'CASCADE', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200824_154327_create_table_iway_iway_customer_agency_origin_hasmany cannot be reverted.\n";

        return false;
    }
}
