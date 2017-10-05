<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Бланки анализов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analysis-blank-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить бланк?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'category',
                'label' => 'Вид живтоного'
            ],
            'animal_name',
            'keeper',
            [
            'attribute' => 'doctor_id',
             'value' => function ($model) {
                 return $model->doctor->name . ' '
                    . $model->doctor->lastname . ' '
                    . $model->doctor->patronymic;
             },
            ],
            'glucose',
            'creatinine',
            'alt',
            'ast',
            'urea',
            'lamilaza',
            'calcium',
            'total_protein',
            'total_bilirubin',
            'alkaline_phosphatase',
            'phosphorus',
            'date_publication',
            'medical_mark:ntext',
        ],
    ]) ?>

</div>
