<?php

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use common\models\Settings;

NavBar::begin([
    'brandLabel' => 'ВЕТЗООЛЭНД',
]);

$isRecordAvailable = Settings::getValue('isRecordAvailable');

$menuItems = [
    [
        'label' => 'Анализы',
        'url' => ['analysis/index']
    ],
    // ['label' => 'Наши врачи', 'url' => ['site/doctors']],
    [
        'label' => 'Контакты и адреса',
        'url' => ['site/contact']
    ],
    [
        'label' => 'Прайс',
        'url' => null,
        'linkOptions'=>['
            href'=>'https://docs.google.com/spreadsheets/d/1cEjyuX49Gp9rQNHHNIynzgQsuDguoBDe/edit?usp=drive_link&ouid=100301339128194703830&rtpof=true&sd=true',
            'target' => '_blank',
        ],
    ],
    [
        'label' => 'Новости',
        'url' => ['news/index']
    ],
    [
        'label' => 'Запись на прием',
        'url' => ['site/record'],
        'visible' => $isRecordAvailable === 'true'
    ],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = [
        'label' => 'Авторизация',
        'url' => ['/site/login'],
        'options' => ['class' => 'login'],
    ];
} else {
    $menuItems[] = [
        'label' => 'Личный кабинет',
        'items' =>
            [
                [
                    'label' => 'Панель управления',
                    'url' => ['/user'],
                    'visible' => Yii::$app->user->identity->getRole() >= \common\models\User::ROLE_MODER
                ],
                [
                    'label' => 'Профиль',
                    'url' => ['/profile/edit'],
                ],
                [
                    'label' => 'Записи на прием',
                    'url' => ['/profile/records'],
                ],
                [
                    'label' => 'Выход',
                    'url' => ['/site/logout'],
                ],
            ],
    ];
}
echo Nav::widget([
    'items' => $menuItems,
    'options' => ['class' => 'navbar-nav'],
]);

NavBar::end();
?>

