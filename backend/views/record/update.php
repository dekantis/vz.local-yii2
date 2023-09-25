<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AnalysisBlank */

$this->title = 'Редактировать запись: ' . $recordModel->id;
$this->params['breadcrumbs'][] = ['label' => 'Запись приемов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $recordModel->id, 'url' => ['view', 'id' => $recordModel->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="analysis-blank-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'userList' => $userList,
        'clinicList' => $clinicList,
        'isNewRecord' => false,
    ]) ?>

</div>
