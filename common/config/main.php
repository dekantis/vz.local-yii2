<?php
return [
    'sourceLanguage' => 'en',
    'language' => 'ru',
    'charset'=>'utf-8',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'example' => [
            'class' => 'modules\example\Module',
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ]
];
