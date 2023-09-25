<?php

use yii\grid\GridView;

$this->title = 'Записи на прием'

?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'animal_name',
        'animal_type',
        'time:datetime',
        'clinic.address',
    ],
]);