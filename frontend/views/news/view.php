<?php

use yii\widgets\ListView;

$this->title = $content->title;

?>

<div class="row">
    <h2><?= $content->title?></h2>
    <div class="col-md-4 col-lg-4 text-center img-news">
        <img src=<?=$content->image_source?> class="img-responsive">
    </div>
    <div class="lead text-justify text-indent">
        <p><?=$content->text_html?></p>
    </div>
    <h2>Хотите знать больше?</h2>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
        'layout' => "{items}\r\n{sorter}\r\n{pager}"
    ]);?>
</div>