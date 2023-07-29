<?php

use yii\log\FileTarget;

$params = array_merge(
  require __DIR__ . '/../../common/config/params.php',
  require __DIR__ . '/../../common/config/params-local.php',
  require __DIR__ . '/params.php',
  require __DIR__ . '/params-local.php'
);

$config = [
  'id' => 'app-frontend',
  'basePath' => dirname(__DIR__),
  'bootstrap' => ['log'],
  'controllerNamespace' => 'frontend\controllers',
  'components' => [
    'request' => [
      'csrfParam' => '_csrf-frontend',
    ],

    'user' => [
      'identityClass' => 'common\models\User', // Bu modeli kendi User modeliniz ile değiştirin
      'loginUrl' => ['/site/login'], // Frontenddeki login sayfasının URL'si
    ],
    'session' => [
      'name' => 'advanced-frontend',
    ],
    'log' => [
      'targets' => [
        [
          'class' => FileTarget::class,
          'levels' => ['error', 'warning'],
        ],
      ],
    ],
    'errorHandler' => [
      'errorAction' => 'site/error',
    ],
    'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [
        'site/haber/<id:\d+>' => 'site/haber', // Yeni kuralı ekleyin

      ],

    ],
    'urlManagerFrontend' => [
      'class' => 'yii\web\UrlManager',
      'baseUrl' => '',
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [

      ],
    ],

  ],
  'params' => $params,
];

if (YII_ENV_DEV) {
  // Geliştirme ortamında debug modülünü etkinleştirin
  $config['bootstrap'][] = 'debug';
  $config['modules']['debug'] = [
    'class' => 'yii\debug\Module',
    'allowedIPs' => ['1.2.3.4', '127.0.0.1', '::1'], // IP adreslerini uygun şekilde değiştirin
  ];
}

return $config;
