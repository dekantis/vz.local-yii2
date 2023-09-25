<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use backend\controllers\UserController;
use common\models\Profile;
use yii\web\ErrorAction;

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
                'class' => ErrorAction::class,
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
     * Logout action.
     *
     * @return string
     */
     public function actionLogin()
     {
       if (!\Yii::$app->user->isGuest) {
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
     public function actionLogout()
     {
         Yii::$app->user->logout();

         return $this->goBack();
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
