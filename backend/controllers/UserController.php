<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * AnalysisBlankController implements the CRUD actions for AnalysisBlank model.
 */
abstract class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => $this->accessRules()
            ],
        ];
    }

    public function accessRules()
    {
        return [
            [
                'allow' => false
            ]
        ];
    }
}
