<?php

use yii\db\Migration;

/**
 * Class m200528_112804_create_table_location_province
 */
class m200528_112804_create_table_location_province extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $check_province = Yii::$app->db->getTableSchema('location_province');
        if ($check_province === null) {
            $this->createTable('location_province', [
                'id' => $this->primaryKey(),
                'name' => $this->string(255)->null(),
                'slug' => $this->string(255)->null(),
                'Type' => $this->string(255)->null(),
                'TelephoneCode' => $this->integer(11)->null(),
                'ZipCode' => $this->string(255)->null(),
                'CountryId' => $this->integer(11)->null(),
                'CountryCode' => $this->string(255)->null(),
                'SortOrder' => $this->integer(11)->null(),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1),
                'IsDeleted' => $this->tinyInteger(1)->null()->defaultValue(0),
                'created_at' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_by' => $this->integer(11)->null()->defaultValue(1),
            ], $tableOptions);
            $this->addColumn('location_province', 'language', "ENUM('vi', 'en', 'jp') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi' COMMENT 'Language' AFTER `status`");
            $this->createIndex('index-slug', 'location_province', 'slug');
            $this->createIndex('index-language', 'location_province', 'language');
            $this->addForeignKey('fk_location_province_country_id_location_country', 'location_province', 'CountryId', 'location_country', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_location_province_created_by_user', 'location_province', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_location_province_updated_by_user', 'location_province', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
        $check_rows = Yii::$app->db->createCommand('SELECT id FROM location_province')->queryOne();
        if($check_rows === false){
            $this->execute("INSERT INTO `location_province` (`id`, `name`, `Type`, `TelephoneCode`, `ZipCode`, `CountryId`, `CountryCode`, `SortOrder`, `status`, `IsDeleted`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Hà Nội', 'Tỉnh', 43, '', 237, 'VN', 2, 1, 0, NULL, 1535442629, 1, 1),
(2, 'Hà Giang', 'Tỉnh', 219, NULL, 237, 'VN', 25, 0, 0, NULL, NULL, 1, 1),
(4, 'Cao Bằng', 'Tỉnh', 710, NULL, 237, 'VN', 17, 0, 0, NULL, NULL, 1, 1),
(6, 'Bắc Kạn', 'Tỉnh', 281, NULL, 237, 'VN', 7, 0, 0, NULL, NULL, 1, 1),
(8, 'Tuyên Quang', 'Tỉnh', 27, NULL, 237, 'VN', 63, 0, 0, NULL, NULL, 1, 1),
(10, 'Lào Cai', 'Tỉnh', 63, NULL, 237, 'VN', 41, 0, 0, NULL, NULL, 1, 1),
(11, 'Điện Biên', 'Tỉnh', 61, NULL, 237, 'VN', 21, 0, 0, NULL, NULL, 1, 1),
(12, 'Lai Châu', 'Tỉnh', 231, NULL, 237, 'VN', 38, 0, 0, NULL, NULL, 1, 1),
(14, 'Sơn La', 'Tỉnh', 22, NULL, 237, 'VN', 55, 0, 0, NULL, NULL, 1, 1),
(15, 'Yên Bái', 'Tỉnh', 29, NULL, 237, 'VN', 66, 0, 0, NULL, NULL, 1, 1),
(17, 'Hòa Bình', 'Tỉnh', 321, NULL, 237, 'VN', 33, 0, 0, NULL, NULL, 1, 1),
(19, 'Thái Nguyên', 'Tỉnh', 280, NULL, 237, 'VN', 58, 0, 0, NULL, NULL, 1, 1),
(20, 'Lạng Sơn', 'Tỉnh', 25, NULL, 237, 'VN', 40, 0, 0, NULL, NULL, 1, 1),
(22, 'Quảng Ninh', 'Tỉnh', 33, NULL, 237, 'VN', 52, 0, 0, NULL, NULL, 1, 1),
(24, 'Bắc Giang', 'Tỉnh', 781, NULL, 237, 'VN', 6, 0, 0, NULL, NULL, 1, 1),
(25, 'Phú Thọ', 'Tỉnh', 210, NULL, 237, 'VN', 47, 0, 0, NULL, NULL, 1, 1),
(26, 'Vĩnh Phúc', 'Tỉnh', 211, NULL, 237, 'VN', 65, 0, 0, NULL, NULL, 1, 1),
(27, 'Bắc Ninh', 'Tỉnh', 241, NULL, 237, 'VN', 9, 0, 0, NULL, NULL, 1, 1),
(30, 'Hải Dương', 'Tỉnh', 320, NULL, 237, 'VN', 29, 0, 0, NULL, NULL, 1, 1),
(31, 'Hải Phòng', 'Thành Phố', 31, NULL, 237, 'VN', 30, 1, 0, NULL, 1541494321, 1, 1),
(33, 'Hưng Yên', 'Tỉnh', 8, NULL, 237, 'VN', 34, 0, 0, NULL, NULL, 1, 1),
(34, 'Thái Bình', 'Tỉnh', 36, NULL, 237, 'VN', 57, 0, 0, NULL, NULL, 1, 1),
(35, 'Hà Nam', 'Tỉnh', 351, NULL, 237, 'VN', 26, 0, 0, NULL, NULL, 1, 1),
(36, 'Nam Định', 'Tỉnh', 350, NULL, 237, 'VN', 43, 0, 0, NULL, NULL, 1, 1),
(37, 'Ninh Bình', 'Tỉnh', 30, NULL, 237, 'VN', 45, 0, 0, NULL, NULL, 1, 1),
(38, 'Thanh Hóa', 'Tỉnh', 37, NULL, 237, 'VN', 59, 0, 0, NULL, NULL, 1, 1),
(40, 'Nghệ An', 'Tỉnh', 38, NULL, 237, 'VN', 44, 0, 0, NULL, NULL, 1, 1),
(42, 'Hà Tĩnh', 'Tỉnh', 39, NULL, 237, 'VN', 28, 0, 0, NULL, NULL, 1, 1),
(44, 'Quảng Bình', 'Tỉnh', 52, NULL, 237, 'VN', 49, 0, 0, NULL, NULL, 1, 1),
(45, 'Quảng Trị', 'Tỉnh', 53, NULL, 237, 'VN', 53, 0, 0, NULL, NULL, 1, 1),
(46, 'Thừa Thiên Huế', 'Tỉnh', 54, NULL, 237, 'VN', 60, 0, 0, NULL, NULL, 1, 1),
(48, 'Đà Nẵng', 'Thành Phố', 511, NULL, 237, 'VN', 18, 1, 0, NULL, 1541494317, 1, 1),
(49, 'Quảng Nam', 'Tỉnh', 510, NULL, 237, 'VN', 50, 0, 0, NULL, NULL, 1, 1),
(51, 'Quảng Ngãi', 'Tỉnh', 55, NULL, 237, 'VN', 51, 0, 0, NULL, NULL, 1, 1),
(52, 'Bình Định', 'Tỉnh', 650, NULL, 237, 'VN', 11, 0, 0, NULL, NULL, 1, 1),
(54, 'Phú Yên', 'Tỉnh', 57, NULL, 237, 'VN', 48, 0, 0, NULL, NULL, 1, 1),
(56, 'Khánh Hòa', 'Tỉnh', 58, NULL, 237, 'VN', 35, 0, 0, NULL, NULL, 1, 1),
(58, 'Ninh Thuận', 'Tỉnh', 68, NULL, 237, 'VN', 46, 0, 0, NULL, NULL, 1, 1),
(60, 'Bình Thuận', 'Tỉnh', 62, NULL, 237, 'VN', 14, 0, 0, NULL, NULL, 1, 1),
(62, 'Kon Tum', 'Tỉnh', 60, NULL, 237, 'VN', 37, 0, 0, NULL, NULL, 1, 1),
(64, 'Gia Lai', 'Tỉnh', 59, NULL, 237, 'VN', 24, 0, 0, NULL, NULL, 1, 1),
(66, 'Đắk Lắk', 'Tỉnh', 500, NULL, 237, 'VN', 19, 0, 0, NULL, NULL, 1, 1),
(67, 'Đắk Nông', 'Tỉnh', 501, NULL, 237, 'VN', 20, 0, 0, NULL, NULL, 1, 1),
(68, 'Lâm Đồng', 'Tỉnh', 20, NULL, 237, 'VN', 39, 0, 0, NULL, NULL, 1, 1),
(70, 'Bình Phước', 'Tỉnh', 651, NULL, 237, 'VN', 13, 0, 0, NULL, NULL, 1, 1),
(72, 'Tây Ninh', 'Tỉnh', 66, NULL, 237, 'VN', 56, 0, 0, NULL, NULL, 1, 1),
(74, 'Bình Dương', 'Tỉnh', 56, NULL, 237, 'VN', 12, 1, 0, NULL, 1541494307, 1, 1),
(75, 'Đồng Nai', 'Tỉnh', 67, NULL, 237, 'VN', 22, 1, 0, NULL, 1541494309, 1, 1),
(77, 'Bà Rịa - Vũng Tàu', 'Tỉnh', 64, NULL, 237, 'VN', 5, 1, 0, NULL, 1541494310, 1, 1),
(79, 'Hồ Chí Minh', 'Thành Phố', 711, NULL, 237, 'VN', 3, 1, 0, NULL, 1541494311, 1, 1),
(80, 'Long An', 'Tỉnh', 72, NULL, 237, 'VN', 42, 1, 0, NULL, 1541494333, 1, 1),
(82, 'Tiền Giang', 'Tỉnh', 73, NULL, 237, 'VN', 61, 0, 0, NULL, NULL, 1, 1),
(83, 'Bến Tre', 'Tỉnh', 75, NULL, 237, 'VN', 10, 0, 0, NULL, NULL, 1, 1),
(84, 'Trà Vinh', 'Tỉnh', 74, NULL, 237, 'VN', 62, 0, 0, NULL, NULL, 1, 1),
(86, 'Vĩnh Long', 'Tỉnh', 70, NULL, 237, 'VN', 64, 0, 0, NULL, NULL, 1, 1),
(87, 'Đồng Tháp', 'Tỉnh', 230, NULL, 237, 'VN', 23, 0, 0, NULL, NULL, 1, 1),
(89, 'An Giang', 'Tỉnh', 76, NULL, 237, 'VN', 4, 0, 0, NULL, NULL, 1, 1),
(91, 'Kiên Giang', 'Tỉnh', 77, NULL, 237, 'VN', 36, 0, 0, NULL, NULL, 1, 1),
(92, 'Cần Thơ', 'Thành Phố', 26, NULL, 237, 'VN', 16, 1, 0, NULL, 1541494328, 1, 1),
(93, 'Hậu Giang', 'Tỉnh', 218, NULL, 237, 'VN', 31, 0, 0, NULL, NULL, 1, 1),
(94, 'Sóc Trăng', 'Tỉnh', 79, NULL, 237, 'VN', 54, 0, 0, NULL, NULL, 1, 1),
(95, 'Bạc Liêu', 'Tỉnh', 240, NULL, 237, 'VN', 8, 0, 0, NULL, NULL, 1, 1),
(96, 'Cà Mau', 'Tỉnh', 780, NULL, 237, 'VN', 15, 0, 0, NULL, NULL, 1, 1),
(97, 'Nước Ngoài', 'Khác', NULL, NULL, 237, NULL, 1, 1, 0, NULL, NULL, 1, 1);");
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200528_112804_create_table_location_province cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200528_112804_create_table_location_province cannot be reverted.\n";

        return false;
    }
    */
}
