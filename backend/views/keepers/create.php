<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Keeper */

$this->title = 'Create Keeper';
$this->params['breadcrumbs'][] = ['label' => 'Keepers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keeper-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
