<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AnalysisStandart */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Analysis Standarts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analysis-standart-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_id',
            'glucose_min',
            'creatinine_min',
            'alt_min',
            'ast_min',
            'urea_min',
            'lamilaza_min',
            'calcium_min',
            'total_protein_min',
            'total_bilirubin_min',
            'alkaline_phosphatase_min',
            'phosphorus_min',
            'glucose_max',
            'creatinine_max',
            'alt_max',
            'ast_max',
            'urea_max',
            'lamilaza_max',
            'calcium_max',
            'total_protein_max',
            'total_bilirubin_max',
            'alkaline_phosphatase_max',
            'phosphorus_max',
            'ggt_min',
            'cholesterol_min',
            'mg_min',
            'ldg_min',
            'ggt_max',
            'cholesterol_max',
            'mg_max',
            'ldg_max',
        ],
    ]) ?>

</div>
