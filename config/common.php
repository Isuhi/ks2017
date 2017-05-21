<?php
use yii\helpers\ArrayHelper;

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');
 
$params = ArrayHelper::merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
 
return [
	//	'id' => 'basic',
		'name' => 'KuklaStadt',
    'basePath' => dirname(__DIR__),
		'aliases' => [
					'@bower' => '@vendor/bower-asset',
					'@npm'   => '@vendor/npm-asset',
			],
    'bootstrap' => [
				'log',
				'app\modules\admin\Bootstrap',
				'app\modules\main\Bootstrap',
				'app\modules\user\Bootstrap',
		],
		'language' => 'ru-RU',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'charset' => 'utf8',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
                'enablePrettyUrl' => true,
                'showScriptName' => false,
'rules' => [
		[
			'class' => 'yii\web\GroupUrlRule',
			'prefix' => 'admin',
			'routePrefix' => 'admin',
			'rules' => [
					'' => 'default/index',
					'<_m:[\w\-]+>' => '<_m>/default/index',
					'<_m:[\w\-]+>/<id:\d+>' => '<_m>/default/view',
					'<_m:[\w\-]+>/<id:\d+>/<_a:[\w-]+>' => '<_m>/default/<_a>',
					'<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
					'<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_m>/<_c>/<_a>',
					'<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',
			],
		],
	
		'/robots.txt' => 'robots.txt',
		'<_a:(about|map|news|guestbook)>' => 'main/default/<_a>',
		'contact' => 'main/contact/index',
	
		'foto' => 'web/files/global/maxi',
		'news/<alias:[\w-]+>' => 'main/news/view',	
		'articles/<alias:[\w-]+>' => 'main/articles/view',	
		'search/<search:[\w-]+>' => 'main/catalog/search',	
		'<_a>/<alias:[\w-]+>/page<page:\d+>' => 'main/catalog/<_a>',
	
		'category/<alias:[\w-]+>' => 'main/catalog/category',
		'type/<alias:[\w-]+>' => 'main/catalog/type',
	
		'<_a>/page/<page:\d+>' => 'main/catalog/<_a>',
		'<_a>' => 'main/catalog/<_a>',	
		'' => 'main/default/index',
	
		'user/<_a:(login|logout|signup|email-confirm|password-reset-request|password-reset)>' => 'user/default/<_a>',
		'user/<_a>' => 'user/profile/<_a>',
		'<_m:[\w\-]+>' => '<_m>/default/index',
//		'<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',
		'<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w-]+>' => '<_m>/<_c>/<_a>',
		'<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
		'<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_m>/<_c>/<_a>',
	 ],
],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'class' => 'yii\log\Dispatcher',
        ],
				'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'forceTranslation' => true,
                ],
            ],
        ],
				'authManager' => [
				 'class' => 'app\components\AuthManager',
				],
    ],
		'controllerMap' => [
			'elfinder' => [
					'class' => 'mihaildev\elfinder\Controller',
					'access' => ['permAdminPanel'],
//					'disabledCommands' => ['netmount'],
					'roots' => [
							[
									'baseUrl' => '/web',
//									'basePath' => '@webroot',
									'path' => 'files/global',
									'name' => 'Global'
							]
					]
				]
		],

    'params' => $params,
];