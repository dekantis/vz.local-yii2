<?php

use yii\helpers\Html;

$this->title = 'Добавить животное';
$this->params['breadcrumbs'][] = ['label' => 'Животные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="animal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
