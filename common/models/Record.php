<?php
namespace common\models;

use yii\db\ActiveQuery;
use DateTime;

/**
 * @property integer time
 * @property integer user_id
 * @property integer animal_type
 * @property integer animal_name
 * @property integer reason_vizit
 * @property integer clinic_id
 */
class Record extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'records';
    }

    public function rules()
    {
        return [
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Имя пользователя',
            'time' => 'Время записи',
            'reason_vizit' => 'Причина посещения',
            'animal_type' => 'Вид животного',
            'animal_name' => 'Кличка животного',
            'clinic.address' => 'Адрес лечебницы',
        ];
    }

    public function getClinic(): ActiveQuery
    {
        return $this->hasOne(Clinic::class, ['id' => 'clinic_id']);
    }

    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
