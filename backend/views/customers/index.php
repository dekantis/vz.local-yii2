<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\grid\EnumColumn;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DoctorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'email',
            [
                'label' => 'ФИО',
                'attribute' => 'fullname',
                'value' => 'profile.fullname'
            ],
            [
                'label' => 'Телефон',
                'attribute' => 'phone',
                'value' => 'profile.phone'

            ],
            [
                'class' => EnumColumn::class,
                'attribute' => 'status',
                'enum' => User::getStatusList()
            ],
            [
                'class' => EnumColumn::class,
                'attribute' => 'role',
                'enum' => User::getRoleList()
            ],
            [
                    'class' => 'yii\grid\ActionColumn',
                    'template'=>'{view}  {update}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
