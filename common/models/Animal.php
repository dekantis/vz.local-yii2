<?php

namespace common\models;

use Yii;

class Animal extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'animals';
    }

    public function rules()
    {
        return [
            [['name',], 'required'],
            [['year',], 'integer'],
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
        return $this->hasMany(AnalysisBlank::className(), ['animal' => 'id']);
    }

    public function getAnalysisStandarts()
    {
        return $this->hasMany(AnalysisStandarts::className(), ['animal_id' => 'id']);
    }

    public function getAnimalsKeepers()
    {
        return $this->hasMany(AnimalsKeepers::className(), ['animal_id' => 'id']);
    }
}
