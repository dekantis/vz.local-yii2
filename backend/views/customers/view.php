<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Doctor */

$this->title = $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'email',
            [
                'label' => 'ФИО',
                'attribute' => 'profile.fullname',
            ],
            'profile.phone',
            [
                'attribute' => 'status',
                'value' => function($model) {
                    return User::getStatusList()[$model->status];
                }
            ],
            [
                'attribute' => 'role',
                'value' => function($model) {
                    return User::getRoleList()[$model->role];
                }
            ],
        ],
    ]) ?>

</div>
