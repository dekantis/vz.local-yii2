<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\AnalysisBlank;

class AnalysisController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $query = AnalysisBlank::find()
            ->orderBy('date_publication', SORT_DESC);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView()
    {
        $query = AnalysisBlank::find()
            ->orderBy('date_publication', SORT_DESC);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $this->render('view', [
            'dataProvider' => $dataProvider
        ]);
    }
}
