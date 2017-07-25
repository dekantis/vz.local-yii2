<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\AnalysisBlank;
use common\models\User;

class SiteController extends Controller
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
        return $this->render('index');
    }
    public function actionDoctors()
    {
        return $this->render('doctors');
    }
    public function actionContact()
    {
        return $this->render('contact');
    }
    public function actionPrice()
    {
        return $this->render('price');
    }
}
