<?php

use yii\db\Migration;

/**
 * Class m200729_040801_create_table_products
 */
class m200729_040801_create_table_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'cat_id'=> $this->integer(11)->notNull(),
            'pro_name' => $this->string(255)->notNull(),
            'pro_slug' => $this->string(255)->notNull()->unique(),
            'pro_description' => $this->string(255)->null(),
            'pro_quantity' => $this->integer(11)->defaultValue(0),
            'pro_price' => $this->integer(11)->null(),
            'pro_image'=> $this->string(255)->notNull()->defaultValue('no-image.png'),
            'pro_status'=> $this->tinyInteger(1)->notNull()->defaultValue(1),
            'pro_sale'=>$this->tinyInteger(4)->notNull()->defaultValue('0'),
            'pro_number'=>$this->integer(11)->defaultValue(0),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime(),
        ],$tableOptions);
        $this->addForeignKey('fk_categories_id','products','cat_id','categories','id','CASCADE');
        $this->addCommentOnColumn('{{%products}}','pro_number','số lần bán được sản phẩm');
        $check_rows = Yii::$app->db->createCommand('SELECT id FROM products')->queryOne();
        if($check_rows === false){
            $this->execute('INSERT INTO `products` (`id`, `pro_name`, `pro_slug`, `pro_description`, `pro_quantity`, `pro_price`, `pro_image`, `pro_status`, `pro_sale`, `created_at`, `updated_at`, `cat_id`, `pro_number`) VALUES
(1, \'Áo sơ mi họa tiết xanh\', \'ao-so-mi-hoa-tiet-xanh\', \'<p>&Aacute;o sơ mi họa tiết</p>\', 10, 10000, \'/backend/web/uploads/phppy0AYP.jpeg\', 1, 0, \'2020-07-25 13:46:29\', \'2020-07-25 13:46:29\', 6, 0),
(2, \'Áo sơ mi họa tiết trắng\', \'ao-so-mi-hoa-tiet-trang\', \'<p>&Aacute;o sơ mi họa tiết trắng</p>\', 10, 100000, \'/backend/web/uploads/phpNXHHid.jpeg\', 1, 0, \'2020-07-25 13:47:03\', \'2020-07-25 13:47:03\', 6, 0),
(3, \'Áo sơ mi ca rô đỏ\', \'ao-so-mi-ca-ro-do\', \'<p>&Aacute;o sơ mi ca r&ocirc; đỏ</p>\', 10, 120000, \'/backend/web/uploads/php1KLYru.jpeg\', 1, 0, \'2020-07-25 13:48:24\', \'2020-07-25 13:48:24\', 6, 0),
(4, \'Áo sơ mi ca rô xanh-nâu\', \'ao-so-mi-ca-ro-xanh-nau\', \'<p>&Aacute;o sơ mi ca r&ocirc; xanh-n&acirc;u</p>\', 10, 120000, \'/backend/web/uploads/php5KQvaA.jpeg\', 1, 0, \'2020-07-25 13:49:10\', \'2020-07-25 13:49:10\', 6, 0),
(5, \'Áo sơ mi ca rô xanh\', \'ao-so-mi-ca-ro-xanh\', \'<p>&Aacute;o sơ mi ca r&ocirc; xanh</p>\', 10, 120000, \'/backend/web/uploads/phpTuQrQ5.jpeg\', 1, 0, \'2020-07-25 13:50:03\', \'2020-07-25 13:50:03\', 6, 0),
(6, \'Áo sơ mi họa tiết biển\', \'ao-so-mi-hoa-tiet-bien\', \'<p>&Aacute;o sơ mi họa tiết biển</p>\', 10, 150000, \'/backend/web/uploads/php0rQ5O8.jpeg\', 1, 0, \'2020-07-25 13:51:08\', \'2020-07-25 13:51:08\', 6, 0),
(7, \'Váy đỏ\', \'vay-do\', \'<p>V&aacute;y đỏ</p>\', 10, 200000, \'/backend/web/uploads/phpvyCvSg.jpeg\', 1, 0, \'2020-07-25 13:51:39\', \'2020-07-25 13:51:39\', 9, 0),
(8, \'Áo khoác ngủ\', \'ao-khoac-ngu\', \'<p>&Aacute;o kho&aacute;c ngủ</p>\', 10, 90000, \'/backend/web/uploads/phpVLfWih.jpeg\', 1, 0, \'2020-07-25 13:52:25\', \'2020-07-25 13:52:25\', 6, 0),
(9, \'Áo cổ tròn đen\', \'ao-co-tron-den\', \'<p>&Aacute;o cổ tr&ograve;n đen</p>\', 10, 150000, \'/backend/web/uploads/phpcEaMEc.jpeg\', 1, 0, \'2020-07-25 13:53:13\', \'2020-07-25 13:53:13\', 6, 0),
(10, \'Áo trắng\', \'ao-trang\', \'<p>&Aacute;o trắng tay lửng phối hợp c&ugrave;ng 2 sọc dọc tr&ecirc;n th&acirc;n tay &aacute;o</p>\', 10, 250000, \'/backend/web/uploads/php85nggO.jpeg\', 1, 0, \'2020-07-25 13:54:17\', \'2020-07-25 13:54:17\', 6, 0),
(11, \'Váy xanh\', \'vay-xanh\', \'<p>V&aacute;y xanh ngắn tay, phong c&aacute;ch hiện đại trẻ trung</p>\', 10, 140000, \'/backend/web/uploads/phpJe2x6H.jpeg\', 1, 0, \'2020-07-25 13:55:04\', \'2020-07-25 13:55:04\', 9, 0),
(12, \'Balo nâu\', \'balo-nau\', \'<p>Balo n&acirc;u tiện lợi mẫu m&atilde; đẹp hợp tr&ecirc;n nhất thị trường hiện nay.</p>\', 10, 300000, \'/backend/web/uploads/phpN89Omy.jpeg\', 1, 0, \'2020-07-25 13:55:58\', \'2020-07-25 13:55:58\', 7, 0),
(13, \'Balo xách\', \'balo-xach\', \'<p>Chiếc balo c&aacute;ch t&acirc;n sử dụng đa năng cho cả x&aacute;ch v&agrave; đeo. T&ugrave;y biến theo t&iacute;nh c&aacute;ch v&agrave; sở th&iacute;ch người d&ugrave;ng.</p>\', 10, 350000, \'/backend/web/uploads/phpJ7w7pq.jpeg\', 1, 0, \'2020-07-25 13:57:11\', \'2020-07-25 13:57:11\', 7, 0),
(14, \'Giày thể thao nike 19.1x\', \'giay-the-thao-nike-19-1x\', \'<p>Gi&agrave;y thể thao nike 19.1x.</p>\', 10, 400000, \'/backend/web/uploads/phpLdd7SU.jpeg\', 1, 5, \'2020-07-25 13:57:57\', \'2020-07-25 13:57:57\', 8, 0);'
            );
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return $this->dropTable('{{%products}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200729_040801_create_table_products cannot be reverted.\n";

        return false;
    }
    */
}