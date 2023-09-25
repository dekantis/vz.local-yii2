<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;
use yii\db\ActiveQuery;

class CustomerSearch extends User
{
    public $phone;
    public $image;
    public $fullname;

    public function rules()
    {
        return [
            [['phone', 'fullname'], 'string'],
            [['role', 'status'], 'integer'],
            [['email'], 'string', 'max' => 255],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = User::find();

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
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'role' => $this->role,
            'status' => $this->status,
        ]);

        $query->joinWith(['profile p' => function(ActiveQuery $query) {
            $query->andFilterWhere(['like', 'p.phone', $this->phone]);
            $query->andFilterWhere([
                'like',
                'CONCAT(p.first_name, " ", p.last_name, " ", p.patronymic)',
                $this->fullname,
            ]);
        }]);

        return $dataProvider;
    }
}
