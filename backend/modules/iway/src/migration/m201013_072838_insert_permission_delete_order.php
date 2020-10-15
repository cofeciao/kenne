<?php

use yii\db\Migration;

/**
 * Class m201013_072838_insert_permission_delete_order
 */
class m201013_072838_insert_permission_delete_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("INSERT INTO `rbac_auth_item`(`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES ('iwayOrderDelete', 2, 'Xóa đơn hàng', NULL, NULL, 1602573798, 1602573798);");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201013_072838_insert_permission_delete_order cannot be reverted.\n";

        return false;
    }
}
