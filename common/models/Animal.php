<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "animals".
 *
 * @property integer $id
 * @property string $name
 * @property integer $year
 * @property integer $category_id
 *
 * @property AnalysisBlank[] $analysisBlanks
 * @property AnalysisStandarts[] $analysisStandarts
 * @property AnimalsKeepers[] $animalsKeepers
 */
class Animal extends \yii\db\ActiveRecord
{
    const TYPE_CAT = 10;
    const TYPE_DOG = 20;

    public function getTypeList()
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category_id'], 'required'],
            [['year', 'category_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Кличка',
            'year' => 'Год рождения',
            'category_id' => 'Вид животного',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnalysisBlanks()
    {
        return $this->hasMany(AnalysisBlank::className(), ['animal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnalysisStandarts()
    {
        return $this->hasMany(AnalysisStandarts::className(), ['animal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnimalsKeepers()
    {
        return $this->hasMany(AnimalsKeepers::className(), ['animal_id' => 'id']);
    }
}
