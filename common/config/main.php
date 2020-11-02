<?php
return [
    'name' => 'Blog',
    'timeZone' => 'Europe/Moscow',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'formatter' => [
            'timeZone' => 'Europe/Moscow',
            'dateFormat' => 'd.MM.Y',
            'timeFormat' => 'H:mm:ss',
            'datetimeFormat' => 'd.MM.Y H:mm',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
