<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use common\models\Settings;

NavBar::begin([
    'brandLabel' => 'ВЕТЗООЛЭНД',
    'options' => [
        'class' => 'navbar navbar-inverse navbar-fixed-top'
    ]
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
            href'=>'https://drive.google.com/file/d/1ATItRXIcLflLpTW1aUQ62PXmz0gyIsPx/view?usp=sharing',
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
        'visible' => $isRecordAvailable == 'true'
    ],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Авторизация', 'url' => ['/site/login']];
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
