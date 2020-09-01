<?php

namespace modava\contact\models\table;

use modava\contact\models\query\ContactQuery;
use yii\db\ActiveRecord;

class ContactTable extends ActiveRecord
{
    const STATUS_DISABLED = 0;
    const STATUS_PUBLISHED = 1;

    public static function tableName()
    {
        return 'contact';
    }

    public static function find()
    {
        return new ContactQuery(get_called_class());
    }
}
