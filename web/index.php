<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');
//$config['components']['urlManager'] = [
//  'class' => 'yii\web\UrlManager',
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'rules' => [
//                'u/<key:[0-9a-zA-Z\-]+>' => '/shorturl/index',
//                '/<controller:\w+>/<action:\w+>/<param:\w+>/<param1:\w+>' => '/<controller>/<action>-<param>-<param1>',
//                '/<controller:\w+>/<action:\w+>/<param:\w+>' => '/<controller>/<action>-<param>',
//                ]
//            ];
(new yii\web\Application($config))->run();
