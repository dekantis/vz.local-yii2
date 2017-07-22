<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "doctors".
 *
 * @property integer $id
 * @property string $name
 * @property string $lastname
 * @property string $patronymic
 * @property integer $specialisation_id
 * @property integer $avatar_id
 *
 * @property AnalysisBlank[] $analysisBlanks
 * @property FileStorage $avatar
 */
class Doctor extends \yii\db\ActiveRecord
{
    const SPECIALISATION_CHERURG = 10;
    const SPECIALISATION_TERAPEVT = 20;
    const SPECIALISATION_LABORANT = 30;
    const SPECIALISATION_DANTIST = 40;

    public function getTypeList()
    {
        return [
            self::SPECIALISATION_CHERURG => 'Хирург',
            self::SPECIALISATION_TERAPEVT => 'Терапевт',
            self::SPECIALISATION_LABORANT => 'Лаборант',
            self::SPECIALISATION_DANTIST => 'Дантист'
        ];
    }
    public static function tableName()
    {
        return 'doctors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'patronymic', 'specialisation_id'], 'required'],
            [['specialisation_id', 'avatar_id'], 'integer'],
            [['name', 'lastname', 'patronymic'], 'string', 'max' => 255],
            [['avatar_id'], 'exist', 'skipOnError' => true, 'targetClass' => FileStorage::className(), 'targetAttribute' => ['avatar_id' => 'id']],
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
            'specialisation_id' => 'Specialisation ID',
            'avatar_id' => 'Avatar ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnalysisBlanks()
    {
        return $this->hasMany(AnalysisBlank::className(), ['doctor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvatar()
    {
        return $this->hasOne(FileStorage::className(), ['id' => 'avatar_id']);
    }
}
