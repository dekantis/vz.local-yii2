<?php

namespace frontend\controllers;

use common\models\Record;
use frontend\forms\ProfileForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\Profile;
use DateTime;

class TestController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays profile.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
