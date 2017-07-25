<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Ветзоолэнд | <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <header>
        <?= $this->render('_header')?>
    </header>
    <div class="container main">
        <?= $content ?>

    <footer class="footer-main">
        <?= $this->render('_footer') ?>
    </footer>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
