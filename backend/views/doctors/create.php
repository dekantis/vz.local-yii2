<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Doctor */

$this->title = 'Добавление доктора';
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
