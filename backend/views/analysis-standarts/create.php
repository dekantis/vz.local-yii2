<?php

use yii\helpers\Html;

$this->title = 'Добавить нормы для бланков';
$this->params['breadcrumbs'][] = ['label' => 'Нормы для бланков', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analysis-standart-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
