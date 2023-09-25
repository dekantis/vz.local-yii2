<?php

namespace backend\controllers;

use Yii;
use common\models\Keeper;
use backend\models\KeeperSearch;
use backend\controllers\AdminController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KeepersController implements the CRUD actions for Keeper model.
 */
class KeepersController extends AdminController
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
     * Lists all Keeper models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KeeperSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Keeper model.
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
     * Creates a new Keeper model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Keeper();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Keeper model.
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
     * Deletes an existing Keeper model.
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
     * Finds the Keeper model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Keeper the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Keeper::findOne($id)) !== null) {
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
            ]
        ];
    }
}
