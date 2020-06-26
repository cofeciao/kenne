<?php

namespace common\models;


class User extends \modava\auth\models\User
{
    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::class, ['user_id' => 'id']);
    }

    public function getUserToken()
    {
        return $this->hasMany(UserToken::class, ['user_id' => 'id']);
    }
}
