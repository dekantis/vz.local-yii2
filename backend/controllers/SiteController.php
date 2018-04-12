<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\SignupForm;
use common\models\User;
use backend\controllers\UserController;
use common\models\Profile;

/**
 * Site controller
 */
class SiteController extends UserController
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
    public function actionProfile()
    {
        $model = ($model = Profile::findOne(Yii::$app->user->id)) ? $model : new Profile();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->updateProfile()) {
                Yii::$app->session->setFlash('success', 'Профиль изменен');
            } else {
              Yii::$app->session->setFlash('error', 'Профиль не изменен');
              Yii::error('Ошибка записи. Профиль не изменен');
              return $this->refresh();
            }
          }
          return $this->render(
            'profile',
            [
              'model' => $model
            ]
          );
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
      if (!\Yii::$app->user->isGuest) {
         return $this->goHome();
      }

      $model = new LoginForm();
      if ($model->load(Yii::$app->request->post()) && $model->loginAdmin()) {
         return $this->goBack();
      } else {
        if ($model->load(Yii::$app->request->post()) && $model->loginModer()) {
           return $this->goBack();
        } else
          return $this->render('login', [
             'model' => $model,
          ]);
      }
    }
    public function actionSignup()
    {
      if (!Yii::$app->user->isGuest) {
          return $this->goHome();
      }
      $model = new SignupForm();

      if($model->load(\Yii::$app->request->post()) && $model->validate()){
        $user = new User();
        $user->username = $model->username;
        $user->setPassword($model->password);
        $user->generateAuthKey();
        $user->status = 20;
        if($user->save()) {
          return $this->goHome();
        }
      }
          return $this->render('signup', [
              'model' => $model,
          ]);

    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function accessRules()
    {
        return [
            [
                'allow' => true,
                'actions' => ['logout', 'index'],
                'roles' => ['@'],
            ],
            [
                'allow' => true,
                'actions' => ['login', 'error', 'signup'],
            ]
        ];
    }
}
