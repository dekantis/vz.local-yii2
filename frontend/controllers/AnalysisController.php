<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\AnalysisBlank;
use common\models\AnalysisStandart;
use yii\web\NotFoundHttpException;

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
            'query' => $query,
            'sort' => false
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id)
    {
        $blank = $this->findModel($id);

        $standart = AnalysisStandart::find()
            ->where(['animal_id' => $blank->animal->category_id])
            ->one();

        return $this->render('view', [
            'blank' => $blank,
            'standart' => $standart
        ]);
    }
    protected function findModel($id)
    {
        if (($model = AnalysisBlank::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
