<?php

use yii\helpers\Html;

$this->title = 'Создать новый бланк';
$this->params['breadcrumbs'][] = ['label' => 'Бланк аналзиов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analysis-blank-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'doctorList' => $doctorList
    ]) ?>

</div>
