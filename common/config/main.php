<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'th',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'modules' => [
        'rbac' => [
            'class' => 'johnitvn\rbacplus\Module',
            'userModelClassName' => null,
            'userModelIdField' => 'id',
            'userModelLoginField' => 'username',
            'userModelLoginFieldLabel' => null,
            'userModelExtraDataColumls' => null,
            'beforeCreateController' => null,
            'beforeAction' => null
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => FALSE,
            'enableFlashMessages' => FALSE,
            'enableConfirmation' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],
        'orm' => [
            'class' => 'frontend\modules\orm\Orm',
        ],
        'dao' => [
            'class' => 'frontend\modules\dao\Dao',
        ],
        'gis' => [
            'class' => 'frontend\modules\gis\Gis',
        ],
        'testbeta' => [
            'class' => 'frontend\modules\testbeta\testbeta',
        ],
        'upload' => [
            'class' => 'frontend\modules\upload\Upload',
        ],
        'visit' => [
            'class' => 'frontend\modules\visit\Visit',
        ],
        'plktest' => [
            'class' => 'frontend\modules\plktest\Plktest',
        ],
        'pcc' => [
            'class' => 'frontend\modules\pcc\PccModule',
        ],
    ]
];
