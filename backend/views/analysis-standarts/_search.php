<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AnalysisStandartSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="analysis-standart-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'glucose_min') ?>

    <?= $form->field($model, 'creatinine_min') ?>

    <?= $form->field($model, 'alt_min') ?>

    <?php // echo $form->field($model, 'ast_min') ?>

    <?php // echo $form->field($model, 'urea_min') ?>

    <?php // echo $form->field($model, 'lamilaza_min') ?>

    <?php // echo $form->field($model, 'calcium_min') ?>

    <?php // echo $form->field($model, 'total_protein_min') ?>

    <?php // echo $form->field($model, 'total_bilirubin_min') ?>

    <?php // echo $form->field($model, 'alkaline_phosphatase_min') ?>

    <?php // echo $form->field($model, 'phosphorus_min') ?>

    <?php // echo $form->field($model, 'glucose_max') ?>

    <?php // echo $form->field($model, 'creatinine_max') ?>

    <?php // echo $form->field($model, 'alt_max') ?>

    <?php // echo $form->field($model, 'ast_max') ?>

    <?php // echo $form->field($model, 'urea_max') ?>

    <?php // echo $form->field($model, 'lamilaza_max') ?>

    <?php // echo $form->field($model, 'calcium_max') ?>

    <?php // echo $form->field($model, 'total_protein_max') ?>

    <?php // echo $form->field($model, 'total_bilirubin_max') ?>

    <?php // echo $form->field($model, 'alkaline_phosphatase_max') ?>

    <?php // echo $form->field($model, 'phosphorus_max') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
