<?php

namespace backend\controllers;

use backend\forms\UserForm;
use Yii;
use common\models\User;
use backend\models\CustomerSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnalysisBlankController implements the CRUD actions for AnalysisBlank model.
 */
class CustomersController extends UserController
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
        $searchModel = new CustomerSearch();
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
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new AnalysisBlank model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = new UserForm([], $this->findModel($id));

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'id' => $id
            ]);
        }
    }
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Выбранного пользователя не существует');
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
            ],
        ];
    }
}
