<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "analysis_standarts".
 *
 * @property integer $id
 * @property integer $animal_id
 * @property double $glucose_min
 * @property double $creatinine_min
 * @property double $alt_min
 * @property double $ast_min
 * @property double $urea_min
 * @property double $lamilaza_min
 * @property double $calcium_min
 * @property double $total_protein_min
 * @property double $total_bilirubin_min
 * @property double $alkaline_phosphatase_min
 * @property double $phosphorus_min
 * @property double $glucose_max
 * @property double $creatinine_max
 * @property double $alt_max
 * @property double $ast_max
 * @property double $urea_max
 * @property double $lamilaza_max
 * @property double $calcium_max
 * @property double $total_protein_max
 * @property double $total_bilirubin_max
 * @property double $alkaline_phosphatase_max
 * @property double $phosphorus_max
 *
 * @property Animals $animal
 */
class AnalysisStandart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'analysis_standarts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'glucose_min', 'creatinine_min', 'alt_min', 'ast_min', 'urea_min', 'lamilaza_min', 'calcium_min', 'total_protein_min', 'total_bilirubin_min', 'alkaline_phosphatase_min', 'phosphorus_min', 'glucose_max', 'creatinine_max', 'alt_max', 'ast_max', 'urea_max', 'lamilaza_max', 'calcium_max', 'total_protein_max', 'total_bilirubin_max', 'alkaline_phosphatase_max', 'phosphorus_max'], 'required'],
            [['category_id'], 'integer'],
            [['albumen_max', 'albumen_min', 'ggt_min', 'cholesterol_min', 'ldg_min', 'mg_min', 'ggt_max', 'cholesterol_max', 'ldg_max', 'mg_max', 'glucose_min', 'creatinine_min', 'alt_min', 'ast_min', 'urea_min', 'lamilaza_min', 'calcium_min', 'total_protein_min', 'total_bilirubin_min', 'alkaline_phosphatase_min', 'phosphorus_min', 'glucose_max', 'creatinine_max', 'alt_max', 'ast_max', 'urea_max',
             'lamilaza_max', 'calcium_max', 'total_protein_max', 'total_bilirubin_max', 'alkaline_phosphatase_max', 'phosphorus_max'], 'number'],
            // [['animal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Animal::className(), 'targetAttribute' => ['animal_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'glucose_min' => 'Глюкоза мин',
            'creatinine_min' => 'Креатинин мин',
            'alt_min' => 'АЛТ мин',
            'ast_min' => 'АСТ мин',
            'urea_min' => 'Мочевина мин',
            'lamilaza_min' => 'Альфа-амилаза мин',
            'calcium_min' => 'Кальций мин',
            'total_protein_min' => 'Общий белок мин',
            'total_bilirubin_min' => 'Общий билирубин мин',
            'alkaline_phosphatase_min' => 'Щелочная фосфатаза мин',
            'phosphorus_min' => 'Фосфор мин',
            'albumen_min' => 'Альбумин мин',
            'glucose_max' => 'Глюкоза макс',
            'creatinine_max' => 'Креатинин макс',
            'alt_max' => 'Алт макс',
            'ast_max' => 'Аст макс',
            'urea_max' => 'Urea Max',
            'lamilaza_max' => 'Lamilaza Max',
            'calcium_max' => 'Calcium Max',
            'total_protein_max' => 'Total Protein Max',
            'total_bilirubin_max' => 'Total Bilirubin Max',
            'alkaline_phosphatase_max' => 'alkaline_phosphatase Max',
            'phosphorus_max' => 'Phosphorus Max',
            'ggt_min' => 'ГГТ мин.',
            'cholesterol_min' => 'Холестерин мин.',
            'ldg_min' => 'ЛДГ мин.',
            'mg_min' => 'Магний мин.',
            'ggt_max' => 'ГГТ макс.',
            'cholesterol_max' => 'Холестерин макс.',
            'ldg_max' => 'ЛДГ макс.',
            'mg_max' => 'Магний макс.',
            'albumen_max' => 'Альбумин макс.'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(AnalysisBlanks::className(), ['id' => 'category_id']);
    }
}
