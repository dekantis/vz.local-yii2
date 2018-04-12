<?php

use yii\helpers\Url;
?>
<div class="row block-border">
    <div class="col-lg-4 col-md-4 text-center img-news">
            <img src=<?=$model->image?> class="img-responsive">
    </div>
    <div class="col-lg-8 col-md-8">
        <p class="lead text-center"><h2>
            <strong><?= $model->title ?></strong>
        </h2></p>
        <p class="lead text-indent"><?=$model->news_discriprion?></p>
    </div>
    <div class="col-lg-12 col-md-12 block-news-footer">
        <a href="<?=Url::to(['news/view', 'id' => $model->id])?>"class="btn btn-default pull-right">Читать полностью</a><p>Опубликовано: <?=$model->created_at?></p>
    </div>
</div>
