<?php

namespace modava\contact\models\query;

use modava\contact\models\Contact;

/**
 * This is the ActiveQuery class for [[Contact]].
 *
 * @see Contact
 */
class ContactQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Contact::tableName() . '.status' => Contact::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Contact::tableName() . '.status' => Contact::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([Contact::tableName() . '.id' => SORT_DESC]);
    }
}
