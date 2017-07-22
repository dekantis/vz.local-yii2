<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AnalysisStandart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="analysis-standart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'animal_id')->textInput() ?>

    <?= $form->field($model, 'glucose_min')->textInput() ?>

    <?= $form->field($model, 'creatinine_min')->textInput() ?>

    <?= $form->field($model, 'alt_min')->textInput() ?>

    <?= $form->field($model, 'ast_min')->textInput() ?>

    <?= $form->field($model, 'urea_min')->textInput() ?>

    <?= $form->field($model, 'lamilaza_min')->textInput() ?>

    <?= $form->field($model, 'calcium_min')->textInput() ?>

    <?= $form->field($model, 'total_protein_min')->textInput() ?>

    <?= $form->field($model, 'total_bilirubin_min')->textInput() ?>

    <?= $form->field($model, 'phosphorus_min')->textInput() ?>

    <?= $form->field($model, 'glucose_max')->textInput() ?>

    <?= $form->field($model, 'creatinine_max')->textInput() ?>

    <?= $form->field($model, 'alt_max')->textInput() ?>

    <?= $form->field($model, 'ast_max')->textInput() ?>

    <?= $form->field($model, 'urea_max')->textInput() ?>

    <?= $form->field($model, 'lamilaza_max')->textInput() ?>

    <?= $form->field($model, 'calcium_max')->textInput() ?>

    <?= $form->field($model, 'total_protein_max')->textInput() ?>

    <?= $form->field($model, 'total_bilirubin_max')->textInput() ?>

    <?= $form->field($model, 'phosphorus_max')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
