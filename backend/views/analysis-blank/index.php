<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Doctor;
use yii\helpers\ArrayHelper;
use common\grid\EnumColumn;

$this->title = 'Бланки анализов';
$this->params['breadcrumbs'][] = $this->title;

$doctors = ArrayHelper::map(Doctor::find()->all(), 'id', 'fullname');
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
            'animal_name',
            'keeper',
            [
                'class' => EnumColumn::class,
                'attribute' => 'doctor_id',
                'value' => 'doctor.fullname',
                'enum' => $doctors,
                'contentOptions' => ['class' => 'hidden-xs'],
                'headerOptions'  => ['class' => 'hidden-xs'],
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
            [
                'attribute'      => 'date_publication',
                'format' => ['date', 'php:d.m.Y'],
                'contentOptions' => ['class' => 'hidden-xs'],
                'headerOptions'  => ['class' => 'hidden-xs'],
            ],
            // 'medical_mark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
