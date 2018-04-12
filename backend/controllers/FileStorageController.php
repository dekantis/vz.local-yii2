<?php

namespace backend\controllers;

use Yii;
use common\models\FileStorage;
use common\models\User;
use backend\models\FileStorageSearch;
use backend\controllers\UserController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FileStorageController implements the CRUD actions for FileStorage model.
 */
class FileStorageController extends UserController
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
     * Lists all FileStorage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FileStorageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FileStorage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FileStorage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FileStorage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FileStorage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FileStorage model.
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
     * Finds the FileStorage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FileStorage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FileStorage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
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
                    return (User::isUserAdmin(Yii::$app->user->identity->username)||User::isUserModer(Yii::$app->user->identity->username));
                }
            ]
        ];
    }
}
