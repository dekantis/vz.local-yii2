<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin([
    'brandLabel' => 'ВЕТЗООЛЭНД',
    'options' => [
        'class' => 'navbar navbar-inverse navbar-fixed-top'
    ]
]);
echo Nav::widget([
    'items' => [
        ['label' => 'Анализы', 'url' => ['analysis/index']],
        // ['label' => 'Наши врачи', 'url' => ['site/doctors']],
        ['label' => 'Контакты и адреса', 'url' => ['site/contact']],
        ['label' => 'Прайс', 'url' => ['site/price']],
    ],
    'options' => ['class' => 'navbar-nav'],
]);

NavBar::end();
