<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AnalysisBlank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="analysis-blank-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->radioList($model->typeList) ?>

    <?= $form->field($model, 'animal_name')->textInput() ?>

    <?= $form->field($model, 'keeper')->textInput() ?>

    <?= $form->field($model, 'doctor_id')->radioList($doctorList) ?>

    <?= $form->field($model, 'glucose')->textInput() ?>

    <?= $form->field($model, 'creatinine')->textInput() ?>

    <?= $form->field($model, 'alt')->textInput() ?>

    <?= $form->field($model, 'ast')->textInput() ?>

    <?= $form->field($model, 'urea')->textInput() ?>

    <?= $form->field($model, 'lamilaza')->textInput() ?>

    <?= $form->field($model, 'calcium')->textInput() ?>

    <?= $form->field($model, 'total_protein')->textInput() ?>

    <?= $form->field($model, 'total_bilirubin')->textInput() ?>

    <?= $form->field($model, 'phosphorus')->textInput() ?>

    <?= $form->field($model, 'ggt')->textInput() ?>

    <?= $form->field($model, 'cholesterol')->textInput() ?>

    <?= $form->field($model, 'mg')->textInput() ?>
    
    <?= $form->field($model, 'ldg')->textInput() ?>

    <?= $form->field($model, 'alkaline_phosphatase')->textInput() ?>

    <?= $form->field($model, 'medical_mark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
