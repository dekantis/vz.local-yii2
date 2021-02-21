<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;
use common\models\Settings;

$this->title = 'Запись на прием';
$this->params['breadcrumbs'][] = $this->title;

$isRecordAvailable = Settings::getValue('isRecordAvailable');

?>
<div class="record-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать запись на прием', ['create'], ['class' => 'btn btn-success']) ?>
        <div class="btn-group" role="group" aria-label="Basic example">
            <?= Html::a(
                    'Включить',
                    ['/settings/change', 'name' => 'isRecordAvailable', 'value' => 'true'],
                    [
                        'class' => $isRecordAvailable == 'false' ? 'btn btn-success' : 'btn btn-default',
                        'disabled' => $isRecordAvailable == 'true'
                    ]
            ) ?>
            <?= Html::a(
                    'Выключить',
                    ['/settings/change', 'name' => 'isRecordAvailable', 'value' => 'false'],
                    [
                        'class' => $isRecordAvailable == 'true' ? 'btn btn-danger' : 'btn btn-default',
                        'disabled' => $isRecordAvailable == 'false'
                    ]
            ) ?>
        </div>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'time',
                'value' => function ($model) {
                    return date('d.m.Y H:i:s', $model->time);
                },
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'language' => 'ru',
                    'model' => $searchModel,
                    'attribute' => 'time',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd.mm.yyyy',
                    ]
                ]),
            ],
            [
                'attribute' => 'email',
                'value' => 'user.email'
            ],
            [
                'label' => 'ФИО',
                'attribute' => 'fullname',
                'value' => 'user.profile.fullname'
            ],
            'animal_name',
            'animal_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
