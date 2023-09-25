<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $patronymic
 * @property string $phone
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'profile';
    }

    public function rules()
    {
        return [
            ['phone', 'integer'],
            [['first_name', 'last_name', 'patronymic'], 'string', 'max' => 64],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'patronymic' => 'Отчество',
            'phone' => 'Телефон',
        ];
    }

    public function getFullName()
    {
        $fullName = $this->first_name . ' ' . $this->last_name . ' ' . $this->patronymic;
        return trim(preg_replace("/  +/", " ", $fullName));
    }

    public function getUser()
    {
        return $this->hasOne(User, ['id' => 'user_id']);
    }
}
