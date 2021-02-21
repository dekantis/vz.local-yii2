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

class ProfileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $parentBehaviors = parent::behaviors();
        $currentBehaviors = [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['edit', 'records'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['?', '@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['edit', 'records'],
                        'roles' => ['@'],
                    ],
                ]
            ],
        ];
        return array_merge($parentBehaviors, $currentBehaviors);
    }

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

    public function actionEdit()
    {
        $model = new ProfileForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Профиль изменен');
            } else {
                Yii::$app->session->setFlash('error', 'Профиль не изменен');
                Yii::error('Ошибка записи. Профиль не изменен');
                return $this->refresh();
            }
        }
        return $this->render('edit', [
            'model' => $model
        ]);
    }

    public function actionRecords()
    {
        $query = Record::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->where(['>=', 'time', (new DateTime('now'))->getTimestamp()])
            ->orderBy(['time' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false
        ]);

        return $this->render('records', [
            'dataProvider' => $dataProvider
        ]);
    }
}
