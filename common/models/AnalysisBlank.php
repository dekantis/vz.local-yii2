<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "analysis_blank".
 *
 * @property integer $id
 * @property integer $animal_name
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
 */
class AnalysisBlank extends \yii\db\ActiveRecord
{

    const TYPE_CAT = 10;
    const TYPE_DOG = 20;
    const TYPE_RABIT = 30;

    public static function getTypeList()
    {
        return [
            self::TYPE_CAT => 'Кошка',
            self::TYPE_DOG => 'Собака',
            self::TYPE_RABIT => 'Кролик'
        ];
    }

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
            [['animal_name', 'keeper', 'doctor_id', 'category_id'], 'required'],
            [['doctor_id', 'category_id'], 'integer'],
            [['ggt', 'mg', 'cholesterol', 'ldg', 'glucose', 'creatinine', 'alt', 'ast', 'urea', 'lamilaza', 'calcium', 'total_protein', 'total_bilirubin', 'alkaline_phosphatase', 'phosphorus'], 'number'],
            [['date_publication'], 'safe'],
            [['animal_name', 'medical_mark', 'keeper'], 'string'],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'animal_name' => 'Кличка животного',
            'category_id' => 'Вид животного',
            'keeper' => 'Владелец',
            'doctor_id' => 'Доктор',
            'glucose' => 'Глюкоза',
            'creatinine' => 'Креатинин',
            'alt' => 'АЛТ',
            'ast' => 'АСТ',
            'urea' => 'Мочевина',
            'lamilaza' => 'Альфа Амилаза',
            'calcium' => 'Кальций',
            'total_protein' => 'Общий белок',
            'total_bilirubin' => 'Общий билирубин',
            'alkaline_phosphatase' => 'Щелочная фосфатаза',
            'phosphorus' => 'Фосфор',
            'date_publication' => 'Дата публикации',
            'medical_mark' => 'Врачебная пометка',
            'ggt' => 'ГГТ',
            'mg' => 'Магний',
            'cholesterol' => 'Холестерин',
            'ldg' => 'ЛДГ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'doctor_id']);
    }

    public function getCategory()
    {
        return $this->typeList[$this->category_id];
    }

    public function getAnalysisStandarts()
    {
        return $this->hasMany(AnalysisStandarts::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
}
