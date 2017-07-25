<?php

namespace common\models;

use Yii;

class Animal extends \yii\db\ActiveRecord
{
    const TYPE_CAT = 10;
    const TYPE_DOG = 20;

    public static function getTypeList()
    {
        return [
            self::TYPE_CAT => 'Кошка',
            self::TYPE_DOG => 'Собака'
        ];
    }

    public static function tableName()
    {
        return 'animals';
    }

    public function rules()
    {
        return [
            [['name', 'category_id'], 'required'],
            [['year', 'category_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Кличка',
            'year' => 'Год рождения',
            'category_id' => 'Вид животного',
        ];
    }

    public function getAnalysisBlanks()
    {
        return $this->hasMany(AnalysisBlank::className(), ['animal_id' => 'id']);
    }

    public function getAnalysisStandarts()
    {
        return $this->hasMany(AnalysisStandarts::className(), ['animal_id' => 'id']);
    }

    public function getAnimalsKeepers()
    {
        return $this->hasMany(AnimalsKeepers::className(), ['animal_id' => 'id']);
    }

    public function getCategory()
    {
        return $this->typeList[$this->category_id];
    }
}
