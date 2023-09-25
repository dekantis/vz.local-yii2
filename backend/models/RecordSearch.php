<?php

namespace backend\models;

use common\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Record;
use yii\db\ActiveQuery;

/**
 * AnalysisBlankSearch represents the model behind the search form about `common\models\AnalysisBlank`.
 */
class RecordSearch extends Record
{
    /**
     * @inheritdoc
     */

    public $time_from;
    public $time_to;
    public $email;
    public $fullname;

    public function rules()
    {
        return [
            [['fullname'], 'string'],
            [['email'], 'string'],
            [['animal_name'], 'string'],
            [['animal_type'], 'string'],
            [['user_id'], 'integer'],
            [['time_from', 'time_to', 'time'], 'date', 'format' => 'php:d.m.Y']
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
        $query = Record::find();

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
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'u.email', $this->email]);
        $query->andFilterWhere(['like', 'animal_type', $this->animal_type]);
        $query->andFilterWhere(['like', 'animal_name', $this->animal_name]);

        $query->joinWith(['user u' => function(ActiveQuery $query) {
            $query->joinWith(['profile p' => function(ActiveQuery $subQuery) {
                return $subQuery->andFilterWhere([
                    'like',
                    'CONCAT(p.first_name, " ", p.last_name, " ", p.patronymic)',
                    $this->fullname
                ]);
            }]);
        }]);

        if (false == empty($this->time)) {
            $query->andFilterWhere(['>=', 'time', strtotime($this->time)]);
            $query->andFilterWhere(['<', 'time', strtotime($this->time . "+1 day")]);
        }

        return $dataProvider;
    }
}
