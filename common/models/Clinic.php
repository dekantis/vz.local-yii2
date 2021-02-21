<?php

namespace common\models;

use DateTime;

/**
 * @property integer $id
 * @property string $address
 * @property string $time
 */
class Clinic extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'clinics';
    }

    public function rules()
    {
        return [
            [['address'], 'required'],
            [['address'], 'string', 'max' => 255],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Адрес',
        ];
    }

    public function getTimeByDate($date)
    {
        $dayOfWeek = DateTime::createFromFormat('d.m.Y', $date)->format('N') - 1;

        $times = str_split($this->time, 4);

        return str_split($times[$dayOfWeek], 2);
    }
}
