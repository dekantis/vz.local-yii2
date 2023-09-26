<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\User;
use yii\helpers\Html;


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
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="/user/logo.ico" type="image/x-icon">
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Главная',
        'brandUrl' => ['/../site/'],
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if(!Yii::$app->user->isGuest) {
        $menuItems = [
            [
                'label' => 'Пользователи',
                'url' => ['/customers/index'],
                'visible' => Yii::$app->user->identity->getRole() >= User::ROLE_MODER
            ],
            [
                'label' => 'Врачи',
                'url' => ['/doctors/index'],
                'visible' => Yii::$app->user->identity->getRole() >= User::ROLE_MODER
            ],
            [
                'label' => 'Бланки',
                'url' => ['/analysis-blank/index'],
                'visible' => Yii::$app->user->identity->getRole() >= User::ROLE_MODER
            ],
            [
                'label' => 'Нормы',
                'url' => ['/analysis-standarts/index'],
                'visible' => Yii::$app->user->identity->getRole() >= User::ROLE_MODER
            ],
            [
                'label' => 'Новости',
                'url' => ['/news/index'],
                'visible' => Yii::$app->user->identity->getRole() >= User::ROLE_MODER
            ],
            [
                'label' => 'Запись на прием',
                'url' => ['/record/index'],
                'visible' => Yii::$app->user->identity->getRole() >= User::ROLE_MODER
            ],
        ];
    }
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->email. ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Ветзоолэнд <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
