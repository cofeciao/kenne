<?php

namespace modava\iway\models;

use modava\iway\components\MyIwayModel;

class Customer extends MyIwayModel
{
    public static function tableName()
    {
        return 'iway_customer';
    }
}