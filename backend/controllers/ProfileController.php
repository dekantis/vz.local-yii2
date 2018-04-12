<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\User;
use backend\controllers\UserController;
use common\models\Profile;

class ProfileController extends UserController
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
    public function actionIndex()
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
          'index',
          [
            'model' => $model
          ]
        );
    }
    public function accessRules()
    {
        return [
            [
                'allow' => true,
                'actions' => ['index'],
                'roles' => ['@'],
                'matchCallback' => function ($rule, $action) {
                    return (User::isUserAdmin(Yii::$app->user->identity->username)||User::isUserModer(Yii::$app->user->identity->username));
                }
            ],
        ];
    }
}
