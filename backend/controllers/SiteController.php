<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\SignupForm;
use common\models\User;
use backend\controllers\AdminController;

/**
 * Site controller
 */
class SiteController extends AdminController
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
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
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
        $user->phone = $model->phone;
        $user->name = $model->name;
        $user->family = $model->family;
        $user->generateAuthKey();
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
