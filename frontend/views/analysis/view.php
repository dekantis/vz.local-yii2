<?php

use yii\grid\GridView;

?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'animal_id',
        'keeper',
        'doctor_id',
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
        'date_publication:datetime',
        'medical_mark:ntext',
    ],
]);
