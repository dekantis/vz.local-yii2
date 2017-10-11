<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\News;

/**
 * AnalysisBlankSearch represents the model behind the search form about `common\models\AnalysisBlank`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text_html', 'news_discriprion','image_source'], 'required'],
            [['text_html'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'news_discriprion', 'image_source'], 'string', 'max' => 255]
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
        $query = News::find();

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
            'title' => $this->title,
            'text_html' => $this->text_html,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            //'published_at' => $this->published_at,
            'news_discriprion' => $this->news_discriprion,
            //'image' => $this->image,
            'image_source' => $this->image_source
        ]);

        return $dataProvider;
    }
}
