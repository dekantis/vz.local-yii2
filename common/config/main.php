<?php
return [
    'sourceLanguage' => 'en',
    'language' => 'ru',
    'charset'=>'utf-8',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
