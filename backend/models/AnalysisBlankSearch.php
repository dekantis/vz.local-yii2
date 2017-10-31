<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AnalysisBlank;

/**
 * AnalysisBlankSearch represents the model behind the search form about `common\models\AnalysisBlank`.
 */
class AnalysisBlankSearch extends AnalysisBlank
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'doctor_id', 'category_id'], 'integer'],
            [['glucose', 'creatinine', 'alt', 'ast', 'urea', 'lamilaza', 'calcium', 'total_protein', 'total_bilirubin', 'alkaline_phosphatase', 'phosphorus'], 'number'],
            [['date_publication', 'medical_mark', 'keeper', 'animal_name'], 'safe'],
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
        $query = AnalysisBlank::find();

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
            'animal_name' => $this->animal_name,
            'keeper' => $this->keeper,
            'doctor_id' => $this->doctor_id,
            'glucose' => $this->glucose,
            'creatinine' => $this->creatinine,
            'alt' => $this->alt,
            'ast' => $this->ast,
            'urea' => $this->urea,
            'lamilaza' => $this->lamilaza,
            'calcium' => $this->calcium,
            'total_protein' => $this->total_protein,
            'total_bilirubin' => $this->total_bilirubin,
            'alkaline_phosphatase' => $this->alkaline_phosphatase,
            'phosphorus' => $this->phosphorus,
            'date_publication' => $this->date_publication,
            'ggt' => $this->ggt,
            'cholesterol' => $this->cholesterol,
            'mg' => $this->mg,
            'ldg' => $this->ldg,

        ]);

        $query->andFilterWhere(['like', 'medical_mark', $this->medical_mark]);

        return $dataProvider;
    }
}
