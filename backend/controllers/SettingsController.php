<?php

namespace backend\controllers;

use common\models\Settings;
use common\models\User;
use Yii;

/**
 * AnalysisBlankController implements the CRUD actions for AnalysisBlank model.
 */
class SettingsController extends UserController
{
    public function actionChange($name, $value)
    {
        Settings::setValue($name, $value);
        return $this->redirect('/user/record/index');
    }

    public function accessRules()
    {
        return [
            [
                'allow' => true,
                'actions' => ['change'],
                'roles' => ['@'],
                'matchCallback' => function ($rule, $action) {
                    return Yii::$app->user->identity->getRole() > User::ROLE_MODER;
                }
            ]
        ];
    }
}
