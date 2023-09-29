<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Url;

/** @var ActiveDataProvider $dataProvider */
$this->title = 'Анализы';
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'rowOptions'   => function ($model, $key, $index, $grid) {
        return ['data-id' => $model->id, 'class' => 'tr-click'];
    },
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'animal_name',
        [
            'attribute' => 'category',
            'label' => 'Вид живтоного'
        ],
        'keeper',
        [
            'attribute' => 'doctor.fullName',
            'label' => 'Доктор',
            'contentOptions' => ['class' => 'hidden-xs'],
            'headerOptions'  => ['class' => 'hidden-xs'],
        ],
        [
            'attribute'      => 'date_publication',
            'format' => ['date', 'php:d.m.Y'],
            'contentOptions' => ['class' => 'hidden-xs'],
            'headerOptions'  => ['class' => 'hidden-xs'],
        ],
    ],
]);

$this->registerJs("
    $('td').click(function (e) {
        var id = $(this).closest('tr').data('id');
        if(e.target == this)
            location.href = '" . Url::to(['view']) . "?id=' + id;
    });
");
