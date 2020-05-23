<?php

namespace modava\product\models\table;

use modava\product\models\query\ProductQuery;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $product_code
 * @property int $category_id
 * @property int $type_id
 * @property string $title
 * @property string $slug
 * @property string|null $image
 * @property string|null $price
 * @property string|null $price_sale
 * @property string|null $so_luong
 * @property string|null $description
 * @property string|null $content
 * @property string|null $product_tech
 * @property int|null $position
 * @property string|null $ads_pixel
 * @property string|null $ads_session
 * @property int $status
 * @property int|null $views
 * @property string $language Language for yii2
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 */
class ProductTable extends \yii\db\ActiveRecord
{
    const STATUS_PUBLISHED = 1;
    const STATUS_DISABLED = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public static function find()
    {
        return new ProductQuery(get_called_class());
    }

}