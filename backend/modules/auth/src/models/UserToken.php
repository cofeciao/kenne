<?php


namespace modava\auth\models;

use modava\auth\AuthModule;
use modava\auth\models\query\UserTokenQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\base\InvalidCallException;
use Yii;

class UserToken extends ActiveRecord
{
    const TYPE_ACTIVATION = 'activation';
    const TYPE_PASSWORD_RESET = 'password_reset';
    const TYPE_LOGIN_PASS = 'login_pass';
    const TOKEN_LENGTH = 40;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_token}}';
    }

    /**
     * @return UserTokenQuery
     */
    public static function find()
    {
        return new UserTokenQuery(get_called_class());
    }

    /**
     * @param mixed $user_id
     * @param string $type
     * @param int|null $duration
     * @return bool|UserToken
     * @throws \yii\base\Exception
     */
    public static function create($user_id, $type, $duration = null)
    {
        $model = new self;
        $model->setAttributes([
            'user_id' => $user_id,
            'type' => $type,
            'token' => Yii::$app->security->generateRandomString(self::TOKEN_LENGTH),
            'expire_at' => $duration ? time() + $duration : null
        ]);

        if (!$model->save()) {
            throw new InvalidCallException;
        };

        return $model;
    }

    /**
     * @param $token
     * @param $type
     * @return bool|User
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public static function use($token, $type)
    {
        $model = self::find()
            ->where(['token' => $token])
            ->andWhere(['type' => $type])
            ->andWhere(['>', 'expire_at', time()])
            ->one();

        if ($model === null) {
            return null;
        }

        $user = $model->user;
        $model->delete();

        return $user;
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'type', 'token'], 'required'],
            [['user_id', 'expire_at'], 'integer'],
            [['type'], 'string', 'max' => 255],
            [['token'], 'string', 'max' => self::TOKEN_LENGTH]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'user_id' => Yii::t('backend', 'User ID'),
            'type' => Yii::t('backend', 'Type'),
            'token' => Yii::t('backend', 'Token'),
            'expire_at' => Yii::t('backend', 'Expire At'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserModel::class, ['id' => 'user_id']);
    }

    /**
     * @param int|null $duration
     */
    public function renew($duration)
    {
        $this->updateAttributes([
            'expire_at' => $duration ? time() + $duration : null
        ]);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->token;
    }
}