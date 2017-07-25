<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $blank->animal->name;
$this->params['breadcrumbs'][] = ['label' => 'Бланки анализов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$attributes = [
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
];

?>
<div class="analysis-blank-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $blank,
        'attributes' => [
            [
                'attribute' => 'animal_id',
                'value' => function ($blank) {
                    return $blank->animal->name;
                },
            ],
            'keeper',
            [
                'attribute' => 'animal.category',
                'label' => 'Вид животного'
            ],
            [
                'attribute' => 'doctor.fullName',
                'label' => 'Доктор'
            ],
            'date_publication:datetime',
        ],
    ]) ?>
    <?php foreach ($attributes as $attribute) : ?>
        <div class="row">
            <div class="col-sm-4">
                <?= $blank->attributeLabels()[$attribute] ?>
            </div>
            <div class="col-sm-4">
                <?= $blank->$attribute ?>
            </div>
            <div class="col-sm-4">
                <?php
                    $minAttribute = $attribute . '_min';
                    $maxAttribute = $attribute . '_max';
                ?>
                <p>
                    Минимум: <?= $standart->$minAttribute ?>
                    Максимум: <?= $standart->$maxAttribute ?>
                </p>
            </div>
        </div>
    <?php endforeach; ?>

    <?= DetailView::widget([
        'model' => $blank,
        'attributes' => [
            'medical_mark:ntext',
        ],
    ]) ?>
</div>
