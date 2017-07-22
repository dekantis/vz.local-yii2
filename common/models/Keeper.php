<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "keepers".
 *
 * @property integer $id
 * @property string $name
 * @property string $lastname
 * @property string $patronymic
 *
 * @property AnalysisBlank[] $analysisBlanks
 * @property AnimalsKeepers[] $animalsKeepers
 */
class Keeper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'keepers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'patronymic'], 'required'],
            [['name', 'lastname', 'patronymic'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'patronymic' => 'Patronymic',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnalysisBlanks()
    {
        return $this->hasMany(AnalysisBlank::className(), ['keeper' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnimalsKeepers()
    {
        return $this->hasMany(AnimalsKeepers::className(), ['keeper' => 'id']);
    }
}
