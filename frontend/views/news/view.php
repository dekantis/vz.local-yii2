<?php

use yii\widgets\ListView;

$this->title = $content->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <h2><?= $content->title?></h2>
    <div class="col-md-4 col-lg-4 text-center img-news">
        <img src=<?=$content->image?> class="img-responsive">
    </div>
    <div class="lead text-justify">
        <p><?=$content->text_html?></p>
    </div>
    <h2>Хотите знать больше?</h2>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
        'layout' => "{items}\r\n{sorter}"
    ]);?>
</div>
