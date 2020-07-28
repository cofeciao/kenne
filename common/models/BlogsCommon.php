<?php


namespace common\models;


use yii\db\ActiveRecord;
use function GuzzleHttp\Promise\all;

/**
 * This is the model class for table "blogs".
 *
 * @property int $id
 * @property string $image
 * @property string $title
 * @property string $descriptions
 * @property string $date
 * @property string $comments
 * @property string $search
 * @property string $recent_post
 * @property string $tags
 */

class BlogsCommon extends ActiveRecord
{
    const ACTIVE_STATUS = 1;
    public static function tableName()
    {
        return 'blogs';
    }

}