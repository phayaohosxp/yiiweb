<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2_web_uten;port=3306',
            'username' => 'root',
            'password' => '2515',
            'charset' => 'utf8',
        ],
        'db_hdc' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=192.168.1.6;dbname=dhdc;port=3306',
            'username' => 'sa',
            'password' => 'sa',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => FALSE,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'you@gmail.com',
                'password' => '',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
    ],
];
