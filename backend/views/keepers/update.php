<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Keeper */

$this->title = 'Update Keeper: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Keepers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="keeper-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
