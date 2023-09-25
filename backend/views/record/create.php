<?php

use yii\helpers\Html;

$this->title = 'Создать запись на прием';
$this->params['breadcrumbs'][] = ['label' => 'Запись на прием', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'userList' => $userList,
        'clinicList' => $clinicList,
        'isNewRecord' => true
    ]) ?>

</div>
