<?php

namespace common\models;

use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $user_id
 * @property integer $locale
 * @property string $fullname
 * @property string $nickname
 * @property string $about
 * @property string $city
 * @property string $address
 * @property string $phone
 * @property string $id_pancake
 * @property string $facebook
 * @property string $picture
 * @property string $avatar
 * @property string $cover
 * @property integer $gender
 *
 * @property User $user
 */
class UserProfile extends \modava\auth\models\UserProfile
{
}
