<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Бланки анализов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analysis-blank-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить бланк анализов', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
            'attribute' => 'animal_id',
             'value' => 'animal.name',
            ],
            'keeper',
            [
            'attribute' => 'doctor_id',
             'value' => function ($model) {
                 return $model->doctor->name . ' '
                    . $model->doctor->lastname . ' '
                    . $model->doctor->patronymic;
             },
            ],
            // 'glucose',
            // 'creatinine',
            // 'alt',
            // 'ast',
            // 'urea',
            // 'lamilaza',
            // 'calcium',
            // 'total_protein',
            // 'total_bilirubin',
            // 'alkaline_phosphatase',
            // 'phosphorus',
            'date_publication:datetime',
            // 'medical_mark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
