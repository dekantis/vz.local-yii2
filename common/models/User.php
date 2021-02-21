<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $role
 * @property string $password write-only password
 * @property string $email_confirm_token
 *
 * @property Profile $profile
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_EMAIL_CONFIRM = 10;
    const STATUS_DELETED = 20;
    const STATUS_BLOCKED = 30;
    const STATUS_ACTIVE = 40;

    const ROLE_USER = 10;
    const ROLE_MODER = 20;
    const ROLE_ADMIN = 30;

    public static function getRoleList()
    {
        return [
            self::ROLE_ADMIN => 'Админ',
            self::ROLE_MODER => 'Модератор',
            self::ROLE_USER => 'Пользователь',
        ];
    }

    public static function getStatusList()
    {
        return [
            self::STATUS_EMAIL_CONFIRM => 'Подтверждение email',
            self::STATUS_DELETED => 'Удален',
            self::STATUS_BLOCKED => 'Заблокирован',
            self::STATUS_ACTIVE => 'Активен',
        ];
    }

    public static function tableName()
    {
        return 'users';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['role', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN, self::ROLE_MODER]],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'email' => 'Email',
            'status' => 'Статус',
            'role' => 'Права',
            'created_at' => 'Зарегистрирован',
            'updated_at' => 'Обновлено',
            'password_hash' => 'Пароль'
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public function isActive()
    {
        return $this->status == self::STATUS_ACTIVE;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByEmailConfirmToken($token)
    {
        return static::findOne(['email_confirm_token' => $token, 'status' => self::STATUS_EMAIL_CONFIRM]);
    }

    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generateEmailConfirmToken()
    {
        $this->email_confirm_token = Yii::$app->security->generateRandomString();
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::class, ['user_id' => 'id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert == true) {
            $profile = new Profile();
            $profile->user_id = $this->id;
            $profile->save();
        }
    }
}
