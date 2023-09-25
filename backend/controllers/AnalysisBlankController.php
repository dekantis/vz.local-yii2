<?php

namespace backend\controllers;

use Yii;
use common\models\AnalysisBlank;
use backend\models\AnalysisBlankSearch;
use backend\controllers\UserController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\User;
use common\models\Animal;
use common\models\Doctor;
use common\models\AnalysisStandart;

/**
 * AnalysisBlankController implements the CRUD actions for AnalysisBlank model.
 */
class AnalysisBlankController extends UserController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $parentBehaviors = parent::behaviors();
        $currentBehaviors = [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
        return array_merge($parentBehaviors, $currentBehaviors);
    }

    /**
     * Lists all AnalysisBlank models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnalysisBlankSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AnalysisBlank model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $blank = $this->findModel($id);
        $standart = AnalysisStandart::find()
            ->where(['category_id' => $blank->category_id])
            ->one();
        return $this->render('view', [
            'standart' => $standart,
            'blank' => $blank,
        ]);
    }

    /**
     * Creates a new AnalysisBlank model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AnalysisBlank();
        $doctors = Doctor::find()->all();
        $doctorList = ArrayHelper::map($doctors, 'id', 'fullName');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'doctorList' => $doctorList
            ]);
        }
    }

    /**
     * Updates an existing AnalysisBlank model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $doctors = Doctor::find()->all();
        $doctorList = ArrayHelper::map($doctors, 'id', 'fullName');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'doctorList' => $doctorList
            ]);
        }
    }

    /**
     * Deletes an existing AnalysisBlank model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AnalysisBlank model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AnalysisBlank the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AnalysisBlank::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не существует!');
        }
    }

    public function accessRules()
    {
        return [
            [
                'allow' => true,
                'actions' => ['create', 'update', 'index', 'view', 'delete'],
                'roles' => ['@'],
                'matchCallback' => function ($rule, $action) {
                    return Yii::$app->user->identity->getRole() >= User::ROLE_MODER;
                }
            ]
        ];
    }
}
