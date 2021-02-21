<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\AnalysisBlank;

?>

<div class="analysis-standart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(AnalysisBlank::getTypeList(), [
            'prompt' => 'Выберите тип животного'
        ]) ?>
        <div class="row">
            <div class="col-md-6">
            <?= $form->field($model, 'glucose_min')->textInput() ?>

            <?= $form->field($model, 'creatinine_min')->textInput() ?>

            <?= $form->field($model, 'alt_min')->textInput() ?>

            <?= $form->field($model, 'ast_min')->textInput() ?>

            <?= $form->field($model, 'urea_min')->textInput() ?>

            <?= $form->field($model, 'lamilaza_min')->textInput() ?>

            <?= $form->field($model, 'calcium_min')->textInput() ?>

            <?= $form->field($model, 'total_protein_min')->textInput() ?>

            <?= $form->field($model, 'total_bilirubin_min')->textInput() ?>

            <?= $form->field($model, 'alkaline_phosphatase_min')->textInput() ?>

            <?= $form->field($model, 'phosphorus_min')->textInput() ?>

            <?= $form->field($model, 'ggt_min')->textInput() ?>

            <?= $form->field($model, 'cholesterol_min')->textInput() ?>

            <?= $form->field($model, 'mg_min')->textInput() ?>

            <?= $form->field($model, 'ldg_min')->textInput() ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'glucose_max')->textInput() ?>

                <?= $form->field($model, 'creatinine_max')->textInput() ?>

                <?= $form->field($model, 'alt_max')->textInput() ?>

                <?= $form->field($model, 'ast_max')->textInput() ?>

                <?= $form->field($model, 'urea_max')->textInput() ?>

                <?= $form->field($model, 'lamilaza_max')->textInput() ?>

                <?= $form->field($model, 'calcium_max')->textInput() ?>

                <?= $form->field($model, 'total_protein_max')->textInput() ?>

                <?= $form->field($model, 'total_bilirubin_max')->textInput() ?>

                <?= $form->field($model, 'alkaline_phosphatase_max')->textInput() ?>

                <?= $form->field($model, 'phosphorus_max')->textInput() ?>

                <?= $form->field($model, 'ggt_max')->textInput() ?>

                <?= $form->field($model, 'cholesterol_max')->textInput() ?>

                <?= $form->field($model, 'mg_max')->textInput() ?>

                <?= $form->field($model, 'ldg_max')->textInput() ?>
            </div>
        </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
