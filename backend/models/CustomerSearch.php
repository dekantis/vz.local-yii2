<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form about `common\models\AnalysisBlank`.
 */
class CustomerSearch extends User
{
    /**
     * @inheritdoc
     */
    public $image;
    public function rules()
    {
        return [
            [['role'], 'integer'],
            [['username', 'email'], 'string', 'max' => 255],
            [['password_reset_token', 'password_hash', 'auth_key', 'status', 'created_at', 'updated_at'], 'safe'],
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
        $query = User::find();

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
            'username' => $this->username,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            //'published_at' => $this->published_at,
            'role' => $this->role,
            //'image' => $this->image,
        ]);

        return $dataProvider;
    }
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('img/customer/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }
}
