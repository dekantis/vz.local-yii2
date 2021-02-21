<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Doctor */
/* @var $form yii\widgets\ActiveForm */

$statusList = User::getStatusList();
unset($statusList[User::STATUS_EMAIL_CONFIRM]);

if(Yii::$app->user->identity->getRole() != User::ROLE_ADMIN) {
    unset($statusList[User::STATUS_DELETED]);
}

$roleList = User::getRoleList();
unset($roleList[User::ROLE_ADMIN]);

?>

<div class="customer-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= Yii::$app->user->identity->getRole() != User::ROLE_ADMIN && !$isNewRecord ? '' :$form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= Yii::$app->user->identity->getRole() != User::ROLE_ADMIN && !$isNewRecord ? '' : $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <?= Yii::$app->user->identity->getRole() != User::ROLE_ADMIN && $model->status == User::STATUS_DELETED ? '' : $form->field($model, 'status')->dropDownList($statusList) ?>

    <?= Yii::$app->user->identity->getRole() == User::ROLE_ADMIN ? $form->field($model, 'role')->dropDownList($roleList) : ''?>

    <div class="form-group">
        <?= Html::submitButton($isNewRecord ? 'Create' : 'Update', ['class' => $isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
