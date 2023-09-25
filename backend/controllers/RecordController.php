<?php

namespace backend\controllers;

use backend\forms\RecordForm;
use common\models\Clinic;
use Yii;
use common\models\Record;
use backend\models\RecordSearch;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\User;
use DateTime;

/**
 * AnalysisBlankController implements the CRUD actions for AnalysisBlank model.
 */
class RecordController extends UserController
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
        $searchModel = new RecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCreate()
    {
        $model = new RecordForm();
        $userList = ArrayHelper::map(User::find()->all(), 'id', 'email');
        $clinicList = ArrayHelper::map(Clinic::find()->all(), 'id', 'address');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'userList' => $userList,
                'clinicList' => $clinicList
            ]);
        }
    }

    public function actionAvailableHours()
    {
        $date = Yii::$app->request->get('date');
        $clinicId = Yii::$app->request->get('clinic_id');

        $clinic = Clinic::findOne($clinicId);
        list($startTime, $endTime) = $clinic->getTimeByDate($date);

        /** @var Record[] $records */
        $records = Record::find()
            ->where(['<', 'time', strtotime($date . ' +1 day')])
            ->where(['clinic_id' => $clinicId])
            ->where(['user_id' => Yii::$app->user->id])
            ->andWhere(['>=', 'time', strtotime($date)])
            ->all();

        $hours = [];
        for ($i = $startTime; $i < $endTime; $i++) {
            $hour = sprintf("%02d", $i);
            $hours["$hour:00"] = "$hour:00";
            $hours["$hour:30"] = "$hour:30";
        }

        foreach ($records as $record) {
            $time = (new DateTime("@{$record->time}", new \DateTimeZone('UTC')))->format('H:i');
            preg_match('~(\d{2}:\d{2})( \((?<count>\d)+\)){0,1}~', $hours[$time], $math);
            $count = $math['count'] ?? 0;
            $hours[$time] = "$time (". ++$count . ")";
        }
        echo Json::encode($hours);
    }

    public function actionUpdate($id)
    {
        $recordModel = $this->findModel($id);
        $model = new RecordForm([], $recordModel);
        $userList = ArrayHelper::map(User::find()->all(), 'id', 'email');
        $clinicList = ArrayHelper::map(Clinic::find()->all(), 'id', 'address');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                'recordModel' => $recordModel,
                'model' => $model,
                'userList' => $userList,
                'clinicList' => $clinicList
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Record::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не существует.');
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function accessRules()
    {
        return [
            [
                'allow' => true,
                'actions' => ['create', 'update', 'index', 'view', 'delete', 'available-hours'],
                'roles' => ['@'],
                'matchCallback' => function ($rule, $action) {
                    return Yii::$app->user->identity->getRole() >= User::ROLE_MODER;
                }
            ]
        ];
    }
}
