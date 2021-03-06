<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\User;

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
        'brandUrl' => ['/site/'],
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        [
            'label' => 'Пользователи',
            'url' => ['/customers/index'],
            'visible' => (!Yii::$app->user->isGuest)&&(User::isUserAdmin(Yii::$app->user->identity->username))
        ],
        [
            'label' => 'Врачи',
            'url' => ['/doctors/index'],
            'visible' => (!Yii::$app->user->isGuest)&&(User::isUserAdmin(Yii::$app->user->identity->username)||User::isUserModer(Yii::$app->user->identity->username))
        ],
        [
            'label' => 'Бланки',
            'url' => ['/analysis-blank/index'],
            'visible' => (!Yii::$app->user->isGuest)&&(User::isUserAdmin(Yii::$app->user->identity->username)||User::isUserModer(Yii::$app->user->identity->username))        ],
        [
            'label' => 'Нормы',
            'url' => ['/analysis-standarts/index'],
            'visible' => (!Yii::$app->user->isGuest)&&(User::isUserAdmin(Yii::$app->user->identity->username)||User::isUserModer(Yii::$app->user->identity->username))        ],
        [
            'label' => 'Новости',
            'url' => ['/news/index'],
            'visible' => (!Yii::$app->user->isGuest)&&(User::isUserAdmin(Yii::$app->user->identity->username)||User::isUserModer(Yii::$app->user->identity->username))        ],
        [
          'label' => 'Мой профиль',
          'url' => ['/profile/index'],
          'visible' => !Yii::$app->user->isGuest
        ],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
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
