<?php

use yii\db\Migration;

/**
 * Class m200910_093829_create_insert_dropdowns
 */
class m200910_093829_create_insert_dropdowns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(
            "INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('sex', 'iway_customer', '[{\"key\": \"nam\", \"value\": \"Nam\"}, {\"key\": \"nu\", \"value\": \"Nữ\"}, {\"key\": \"khac\", \"value\": \"Khác\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('type', 'iway_customer', '[{\"key\": \"vang_lai\", \"value\": \"Vãng lai\"}, {\"key\": \"online\", \"value\": \"Online\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('category', 'iway_product', '[{\"key\": \"nien\", \"value\": \"Niền\"}, {\"key\": \"implant\", \"value\": \"Implant\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('type', 'iway_payment', '[{\"key\": \"thanh_toan\", \"value\": \"Thanh toán\"}, {\"key\": \"dat_coc\", \"value\": \"Đặt cọc\"}, {\"key\": \"hoan_coc\", \"value\": \"Hoàn cọc\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('method', 'iway_payment', '[{\"key\": \"tien_mat\", \"value\": \"Tiền mặt\"}, {\"key\": \"chuyen_khoan\", \"value\": \"Chuyển khoản\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('status', 'iway_call', '[{\"key\": \"len_ke_hoach\", \"value\": \"Lên kế hoạch\"}, {\"key\": \"da_hoan_thanh\", \"value\": \"Đã hoàn thành\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('online_source', 'iway_customer', '[{\"key\": \"facebook\", \"value\": \"Facebook\"}, {\"key\": \"google\", \"value\": \"Google\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('fb_fanpage', 'iway_customer', '[{\"key\": \"my_auris_1\", \"value\": \"My Auris 1\"}, {\"key\": \"my_auris_2\", \"value\": \"My Auris 2\"}, {\"key\": \"iway\", \"value\": \"Iway\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('who_created', 'iway_customer', '[{\"key\": \"sales_online\", \"value\": \"Sales Online\"}, {\"key\": \"sales_direct\", \"value\": \"Sales Direct\"}, {\"key\": \"khac\", \"value\": \"Khác\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('reason_fail', 'iway_customer', '[{\"key\": \"test\", \"value\": \"test\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('status_customer', 'iway_customer', '[{\"key\": \"dat_hen\", \"value\": \"Đặt hẹn\"}, {\"key\": \"cho_cham_soc_lai\", \"value\": \"Chờ chăm sóc lại\"}, {\"key\": \"fail\", \"value\": \"Fail\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('status', 'iway_appointment_schedule', '[{\"key\": \"dat_hen\", \"value\": \"Đặt hẹn\"}, {\"key\": \"den\", \"value\": \"Đến\"}, {\"key\": \"khong_den\", \"value\": \"Không đến\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('status_service', 'iway_appointment_schedule', '[{\"key\": \"dong_y_lam\", \"value\": \"Đồng ý làm\"}, {\"key\": \"khong_dong_y_lam\", \"value\": \"Không đồng ý làm\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('accept_for_service', 'iway_appointment_schedule', '[{\"key\": \"dich_vu_1\", \"value\": \"Dịch vụ 1\"}, {\"key\": \"dich_vu_2\", \"value\": \"Dịch vụ 2\"}]');
INSERT INTO `dropdowns_config`(`field_name`, `table_name`, `dropdown_value`) VALUES ('reason_fail', 'iway_appointment_schedule', '[{\"key\": \"da_den_nhung_bac_sy_tu_van_khong_ky\", \"value\": \"Đã đến nhưng bác sỹ tư vấn không kỹ ...\"}]');
");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200910_093829_create_insert_dropdowns cannot be reverted.\n";

        return false;
    }
}
