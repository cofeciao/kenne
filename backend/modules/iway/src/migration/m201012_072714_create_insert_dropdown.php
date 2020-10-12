<?php

use yii\db\Migration;

/**
 * Class m201012_072714_create_insert_dropdown
 */
class m201012_072714_create_insert_dropdown extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('status', 'iway_order', '[{\"key\": \"moi\", \"value\": \"Mới\"}, {\"key\": \"dang_thuc_hien\", \"value\": \"Đang thực hiện\"}, {\"key\": \"hoan_thanh\", \"value\": \"Hoàn thành\"}, {\"key\": \"huy\", \"value\": \"Hủy\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('payment_status', 'iway_order', '[{\"key\": \"chua_thanh_toan\", \"value\": \"Chưa thanh toán\"}, {\"key\": \"thanh_toan_1_phan\", \"value\": \"Thanh toán 1 phần\"}, {\"key\": \"thanh_toan_du\", \"value\": \"Thanh toán đủ\"}, {\"key\": \"hoan_coc\", \"value\": \"Hoàn cọc\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('service_status', 'iway_order', '[{\"key\": \"chua_dieu_tri\", \"value\": \"Chưa điều trị\"}, {\"key\": \"dang_thuc_hien\", \"value\": \"Đang thực hiện\"}, {\"key\": \"hoan_thanh\", \"value\": \"Hoàn thành\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('status', 'iway_receipt', '[{\"key\": \"nhap\", \"value\": \"Nháp\"}, {\"key\": \"da_thu\", \"value\": \"Đã thu\"}, {\"key\": \"hoan_coc\", \"value\": \"Hoàn cọc\"}]');");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201012_072714_create_insert_dropdown cannot be reverted.\n";

        return false;
    }
}
