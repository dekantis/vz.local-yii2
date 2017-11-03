<?php

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <h2><?= $model->title?></h2>
        <div class="col-md-4 col-lg-4 text-center img-news-view">
            <img src=<?=$model->image?> class="img-responsive">
        </div>
        <div class="lead text-justify text-indent">
            <p><?=$model->text_html?></p>
        </div>
        <h2>Хотите знать больше?</h2>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
            'layout' => "{items}\r\n{sorter}\r\n{pager}"
        ]);?>
    </div>
</div>
