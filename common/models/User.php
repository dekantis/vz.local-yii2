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
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 * @property Profile $profile
 */
class User extends ActiveRecord implements IdentityInterface
{
     const STATUS_DELETED = 0;
     const STATUS_ACTIVE = 10;
     const ROLE_ADMIN = 10;
     const ROLE_MODER = 20;
     const ROLE_USER = 30;

     public function getRoleList()
     {
         return [
             self::ROLE_ADMIN => 'Админ',
             self::ROLE_MODER => 'Модератор',
             self::ROLE_USER => 'Пользовтаель',
         ];
     }

     public function getStatusList()
     {
         return [
             self::STATUS_DELETED => 'Заблокирован',
             self::STATUS_ACTIVE => 'Активен',
         ];
     }

     /**
      * @inheritdoc
      */
    public static function tableName()
    {
        return 'users';
    }

     /**
      * @inheritdoc
      */
    public function behaviors()
    {
         return [
             TimestampBehavior::className(),
         ];
    }

     /**
      * @inheritdoc
      */
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
            'status'=> 'Статус',
            'role' => 'Права',
            'created_at' => 'Опубликовано',
            'updated_at' => 'Обновлено'
        ];
    }
     /**
      * @inheritdoc
      */
    public static function findIdentity($id)
    {
         return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

     /**
      * @inheritdoc
      */
    public static function isUserAdmin($username)
    {
        if (static::findOne(['username' => $username, 'role' => self::ROLE_ADMIN]))
        {
            return true;
        } else {
            return false;
        }
    }
     /**
      * @inheritdoc
      */
    public static function isUserModer($username)
    {
        if (static::findOne(['username' => $username, 'role' => self::ROLE_MODER]))
        {
            return true;
        } else {
            return false;
        }
    }
     /**
      * @inheritdoc
      */
    public static function isUser($username)
    {
        if (static::findOne(['username' => $username, 'role' => self::ROLE_USER]))
        {
            return true;
        } else {
            return false;
        }
    }
     /**
      * @inheritdoc
      */
    public static function findIdentityByAccessToken($token, $type = null)
    {
         throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

     /**
      * Finds user by username
      *
      * @param string $username
      * @return static|null
      */
    public static function findByUsername($username)
    {
         return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

     /**
      * @inheritdoc
      */
    public function getId()
    {
         return $this->getPrimaryKey();
    }

     /**
      * @inheritdoc
      */
    public function getAuthKey()
    {
         return $this->auth_key;
    }

     /**
      * @inheritdoc
      */
    public function validateAuthKey($authKey)
    {
         return $this->getAuthKey() === $authKey;
    }

     /**
      * Validates password
      *
      * @param string $password password to validate
      * @return bool if password provided is valid for current user
      */
    public function validatePassword($password)
    {
         return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

     /**
      * Generates password hash from password and sets it to the model
      *
      * @param string $password
      */
    public function setPassword($password)
    {
         $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

     /**
      * Generates "remember me" authentication key
      */
    public function generateAuthKey()
    {
         $this->auth_key = Yii::$app->security->generateRandomString();
    }
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }
}
