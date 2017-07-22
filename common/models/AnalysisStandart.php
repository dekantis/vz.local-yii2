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
            [['animal_id', 'glucose_min', 'creatinine_min', 'alt_min', 'ast_min', 'urea_min', 'lamilaza_min', 'calcium_min', 'total_protein_min', 'total_bilirubin_min', 'alkaline_phosphatase_min', 'phosphorus_min', 'glucose_max', 'creatinine_max', 'alt_max', 'ast_max', 'urea_max', 'lamilaza_max', 'calcium_max', 'total_protein_max', 'total_bilirubin_max', 'alkaline_phosphatase_max', 'phosphorus_max'], 'required'],
            [['animal_id'], 'integer'],
            [['glucose_min', 'creatinine_min', 'alt_min', 'ast_min', 'urea_min', 'lamilaza_min', 'calcium_min', 'total_protein_min', 'total_bilirubin_min', 'alkaline_phosphatase_min', 'phosphorus_min', 'glucose_max', 'creatinine_max', 'alt_max', 'ast_max', 'urea_max', 'lamilaza_max', 'calcium_max', 'total_protein_max', 'total_bilirubin_max', 'alkaline_phosphatase_max', 'phosphorus_max'], 'number'],
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
            'animal_id' => 'Animal ID',
            'glucose_min' => 'Glucose Min',
            'creatinine_min' => 'Creatinine Min',
            'alt_min' => 'Alt Min',
            'ast_min' => 'Ast Min',
            'urea_min' => 'Urea Min',
            'lamilaza_min' => 'Lamilaza Min',
            'calcium_min' => 'Calcium Min',
            'total_protein_min' => 'Total Protein Min',
            'total_bilirubin_min' => 'Total Bilirubin Min',
            'alkaline_phosphatase_min' => 'alkaline_phosphatase Min',
            'phosphorus_min' => 'Phosphorus Min',
            'glucose_max' => 'Glucose Max',
            'creatinine_max' => 'Creatinine Max',
            'alt_max' => 'Alt Max',
            'ast_max' => 'Ast Max',
            'urea_max' => 'Urea Max',
            'lamilaza_max' => 'Lamilaza Max',
            'calcium_max' => 'Calcium Max',
            'total_protein_max' => 'Total Protein Max',
            'total_bilirubin_max' => 'Total Bilirubin Max',
            'alkaline_phosphatase_max' => 'alkaline_phosphatase Max',
            'phosphorus_max' => 'Phosphorus Max',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnimal()
    {
        return $this->hasOne(Animals::className(), ['id' => 'animal_id']);
    }
}
