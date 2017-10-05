<?php

use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Анализы'

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
            'label' => 'Доктор'
        ],
        'date_publication:datetime',
    ],
]);

$this->registerJs("
    $('td').click(function (e) {
        var id = $(this).closest('tr').data('id');
        if(e.target == this)
            location.href = '" . Url::to(['view']) . "?id=' + id;
    });
");
