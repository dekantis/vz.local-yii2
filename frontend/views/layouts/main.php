<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
     <link rel="shortcut icon" href="/logo.ico" type="image/x-icon">
</head>
<body>
<?php $this->beginBody() ?>
    <header>
      <?= $this->render('_header')?>
    </header>
    <div class="container main block-border">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <footer class="footer-main">
        <?= $this->render('_footer') ?>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
