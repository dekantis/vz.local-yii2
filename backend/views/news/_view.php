<?php

use yii\helpers\Url;
?>
<div class="block-href-news lead">
    <p><a href="<?=Url::to(['news/view', 'id' => $model->id])?>"><?=$model->title?></a></p>
</div>
