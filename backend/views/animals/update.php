<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Animal */

$this->title = 'Редактировать информацию о животном: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Животные', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="animal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
