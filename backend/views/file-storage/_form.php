<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FileStorage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-storage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
