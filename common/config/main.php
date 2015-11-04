<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=hd-easy',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        */
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=125.65.108.203;dbname=hd-easy',
            'username' => 'root',
            'password' => 'mark8888',
            'charset' => 'utf8',
        ],
/*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            //维护模式时的路由，代表所有解析都被指向提示页！
            //'catchAll' => ['common/weihu'],
            ],
        ]
*/
    ],
];
