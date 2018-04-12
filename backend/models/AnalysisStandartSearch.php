<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AnalysisStandart;

/**
 * AnalysisStandartSearch represents the model behind the search form about `common\models\AnalysisStandart`.
 */
class AnalysisStandartSearch extends AnalysisStandart
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['glucose_min', 'creatinine_min', 'alt_min', 'ast_min', 'urea_min', 'lamilaza_min', 'calcium_min', 'total_protein_min', 'total_bilirubin_min', 'alkaline_phosphatase_min', 'phosphorus_min', 'glucose_max', 'creatinine_max', 'alt_max', 'ast_max', 'urea_max', 'lamilaza_max', 'calcium_max', 'total_protein_max', 'total_bilirubin_max', 'alkaline_phosphatase_max', 'phosphorus_max'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AnalysisStandart::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'glucose_min' => $this->glucose_min,
            'creatinine_min' => $this->creatinine_min,
            'alt_min' => $this->alt_min,
            'ast_min' => $this->ast_min,
            'urea_min' => $this->urea_min,
            'lamilaza_min' => $this->lamilaza_min,
            'calcium_min' => $this->calcium_min,
            'total_protein_min' => $this->total_protein_min,
            'total_bilirubin_min' => $this->total_bilirubin_min,
            'alkaline_phosphatase_min' => $this->alkaline_phosphatase_min,
            'phosphorus_min' => $this->phosphorus_min,
            'glucose_max' => $this->glucose_max,
            'creatinine_max' => $this->creatinine_max,
            'alt_max' => $this->alt_max,
            'ast_max' => $this->ast_max,
            'urea_max' => $this->urea_max,
            'lamilaza_max' => $this->lamilaza_max,
            'calcium_max' => $this->calcium_max,
            'total_protein_max' => $this->total_protein_max,
            'total_bilirubin_max' => $this->total_bilirubin_max,
            'alkaline_phosphatase_max' => $this->alkaline_phosphatase_max,
            'phosphorus_max' => $this->phosphorus_max,
            'ggt_min' => $this->ggt_min,
            'cholesterol_min' => $this->cholesterol_min,
            'mg_min' => $this->mg_min,
            'ldg_min' => $this->ldg_min,
            'ggt_max' => $this->ggt_max,
            'cholesterol_max' => $this->cholesterol_max,
            'mg_max' => $this->mg_max,
            'ldg_max' => $this->ldg_max,

        ]);

        return $dataProvider;
    }
}
