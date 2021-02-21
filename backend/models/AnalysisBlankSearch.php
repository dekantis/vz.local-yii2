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
            [['animal_name', 'keeper'], 'string'],
            [['doctor_id'], 'integer'],
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
            'doctor_id' => $this->doctor_id,
        ]);

        $query->andFilterWhere(['like', 'animal_name', $this->animal_name]);
        $query->andFilterWhere(['like', 'keeper', $this->keeper]);

        return $dataProvider;
    }
}
