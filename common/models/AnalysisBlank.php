<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "analysis_blank".
 *
 * @property integer $id
 * @property integer $animal_id
 * @property integer $keeper
 * @property integer $doctor_id
 * @property double $glucose
 * @property double $creatinine
 * @property double $alt
 * @property double $ast
 * @property double $urea
 * @property double $lamilaza
 * @property double $calcium
 * @property double $total_protein
 * @property double $total_bilirubin
 * @property double $alkaline_phosphatase
 * @property double $phosphorus
 * @property string $date_publication
 * @property string $medical_mark
 *
 * @property Doctors $doctor
 * @property Animals $animal
 * @property Keepers $keeper
 */
class AnalysisBlank extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimeStampBehavior::class,
                'createdAtAttribute' => 'date_publication',
                'updatedAtAttribute' => false,
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'analysis_blank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['animal_id', 'keeper', 'doctor_id'], 'required'],
            [['animal_id', 'doctor_id'], 'integer'],
            [['glucose', 'creatinine', 'alt', 'ast', 'urea', 'lamilaza', 'calcium', 'total_protein', 'total_bilirubin', 'alkaline_phosphatase', 'phosphorus'], 'number'],
            [['date_publication'], 'safe'],
            [['medical_mark', 'keeper'], 'string'],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
            [['animal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Animal::className(), 'targetAttribute' => ['animal_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'animal_id' => 'Животное',
            'category' => 'Вид животного',
            'keeper' => 'Владелец',
            'doctor_id' => 'Доктор',
            'glucose' => 'Глюкоза',
            'creatinine' => 'Креатинин',
            'alt' => 'АЛТ',
            'ast' => 'АСТ',
            'urea' => 'Мочевина',
            'lamilaza' => 'Альфа Амилаза',
            'calcium' => 'Сальций',
            'total_protein' => 'Общий белок',
            'total_bilirubin' => 'Общий билирубин',
            'alkaline_phosphatase' => 'Щелочная фосфатаза',
            'phosphorus' => 'Фосфор',
            'date_publication' => 'Дата публикации',
            'medical_mark' => 'Врачебная пометка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'doctor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnimal()
    {
        return $this->hasOne(Animal::className(), ['id' => 'animal_id']);
    }
}
