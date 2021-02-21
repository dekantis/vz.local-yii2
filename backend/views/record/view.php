<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Doctor */

$this->title = $model->animal_name;
$this->params['breadcrumbs'][] = ['label' => 'Запись приемов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить выбранного пользователя?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'time:datetime',
            [
                'attribute' => 'email',
                'value' => function($model) {
                    return $model->user->email;
                }
            ],
            [
                'label' => 'ФИО',
                'attribute' => 'fullname',
                'value' => function($model) {
                    return $model->user->profile->fullname;
                }
            ],
            'animal_name',
            'animal_type',
            'reason_vizit:ntext'
        ],
    ]) ?>

</div>
