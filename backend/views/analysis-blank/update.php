<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AnalysisBlank */

$this->title = 'Редактировать бланк: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Бланк анализов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="analysis-blank-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'animalList' => $animalList,
        'doctorList' => $doctorList
    ]) ?>

</div>
