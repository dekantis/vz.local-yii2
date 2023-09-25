<?php

namespace frontend\controllers;

use common\models\Clinic;
use common\models\Record;
use common\models\Settings;
use common\models\User;
use frontend\forms\RecordForm;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use common\models\LoginForm;
use frontend\forms\SignupForm;
use yii\web\NotFoundHttpException;
use Datetime;

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

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['logout', 'record', 'available-hours', 'profile'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup', 'index', 'contact', 'price', 'confirm-email'],
                        'roles' => ['?', '@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'record', 'available-hours', 'profile'],
                        'roles' => ['@'],
                    ],
                ]
            ],
        ];
    }

    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Вам отправлено письмо для подтверждения email');
            return $this->goHome();
        }
        return $this->render('signup', [
            'model' => $model,
        ]);

    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionPrice()
    {
        return $this->render('price');
    }

    public function actionRecord()
    {
        $isRecordAvailable = Settings::getValue('isRecordAvailable');

        if ($isRecordAvailable == 'false') {
            throw new NotFoundHttpException('Страница не существует!');
        }

        $countRecords = Record::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->andWhere(['>=', 'time', (new DateTime())->getTimestamp()])
            ->count();

        if ($countRecords > 2) {
            Yii::$app->session->setFlash('info', 'Вы привысили лимит предварительных записей.');
            return $this->redirect(['/profile/records']);
        }
        $model = new RecordForm();
        $userList = ArrayHelper::map(User::find()->all(), 'id', 'email');
        $clinicList = ArrayHelper::map(Clinic::find()->all(), 'id', 'address');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                return $this->redirect(['/profile/records']);
            }
        } else {
            return $this->render('record', [
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
            $hours[$time] = null;
        }
        echo Json::encode(array_filter($hours));
    }

    public function actionConfirmEmail($token)
    {
        $user = User::findByEmailConfirmToken($token);
        if (null != $user ) {
            $user->status = User::STATUS_ACTIVE;
            $user->email_confirm_token = '';
            Yii::$app->session->setFlash('success', 'Вы успешно подтвердили email, можете авторизоваться!');
            $user->save();
            return $this->redirect('login');
        }

        throw new NotFoundHttpException('Страница не существует!');
    }
}
