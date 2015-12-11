<?php
/**
 * Configuration parameters common to all entry points.
 */
return [
    'preload' => ['log'],
    'import' => [
        'common.components.*',
        'common.models.*',
        // The following two imports are polymorphic and will resolve against wherever the `basePath` is pointing to.
        // We have components and models in all entry points anyway
        'application.components.*',
        'application.models.*',

        'yiistrap.helpers.TbHtml',

        'common.extensions.YiiMailer.YiiMailer',
        'common.extensions.ECurrencyHelper.ECurrencyHelper',
        'common.extensions.coinbase.lib.Coinbase',
        'common.extensions.bitcoinphp.src.*',
        'common.extensions.googleauthenticator.PHPGangsta.GoogleAuthenticator',
        'common.extensions.twilio.Services.Twilio',
        'common.widgets.twofactorauth.TwoFactorAuth',
    ],
    'components' => [
        'db' => [
            'schemaCachingDuration' => PRODUCTION_MODE ? 86400000 : 0, // 86400000 == 60*60*24*1000 seconds == 1000 days
            'enableParamLogging' => !PRODUCTION_MODE,
            'charset' => 'utf8'
        ],
        'urlManager' => [
            'urlFormat' => 'path',
            'showScriptName' => false,
            'urlSuffix' => '/',
        ],
        'cache' => extension_loaded('apc')
                ? [
                    'class' => 'CApcCache',
                ]
                : [
                    'class' => 'CDbCache',
                    'connectionID' => 'db',
                    'autoCreateCacheTable' => true,
                    'cacheTableName' => 'cache',
                ],
        'messages' => [
            'basePath' => 'common/messages'
        ],
        'log' => [
            'class' => 'CLogRouter',
            'routes' => [
                'logFile' => [
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning, trace, info',
                    'categories'=>'system.*',
                    'filter' => 'CLogFilter'
                ],
            ]
        ],
        'user' => [
            'class' => 'WebUser'
        ],
        'yiistrap' => [
            'class' => 'yiistrap.components.TbApi',
        ],
	'request' => [
            'enableCsrfValidation' => true,
            'enableCookieValidation' => true,
	    'csrfTokenName' => 'csrftoken',
            'csrfCookie' => [
                'httpOnly' => true,
                'secure' => true,
            ],
        ],
        'session' => [
	    'sessionName' => 'sessionbtx',
	    'class' => 'CHttpSession',
	    'timeout' => 300,
            'cookieParams' => [
                'secure' => true,
                'httpOnly' => true,
            ],
	],
    ],
    'params' => [
        'mbtx' => [
        	'activationUrl' => 'activate',
        	'recoveryUrl' => 'recovery/reset',
        	'recoveryCancelUrl' => 'recovery/cancel',
        	'registrationEmail' => 'register@mercadobtx.com',
        	'defaultEmail' => 'administrator@mercadobtx.com',
        	'registrationUser' => Yii::t('translation', 'MercadoBTX admin'),
        	'adminEmail' => 'administrator@mercadobtx.com',
        ],
        'YiiMailer' => [
            
        ],
        'coinbase' => [
            'API_KEY' => '5164dabb9b7718ec59751a1f588cfc6632337f106778c680b309baf45db2a41a'
        ],
        'bitcoind' => [
            'scheme' => 'http',
            'username' => 'bitcoinrpc',
            'password' => 'J6hQrpF9MCKcYFHeka1GQQBkZ38r6Rr2wyADgnNMnqLP',
            'address' => '127.0.0.1',
            'port' => '8332',
            'certifcate_path' => '',
            'debug_level' => '0',
        ],
        'defaultListPerPage' => 10,
        'twilio' => [
            'from_phone' => '+18325142503',
            'sid' => 'AC11ee2f2853cf346802b8b0885d0a0f69',
            'auth' => '9619157c5c56cc1b9701ee56932a2913'
        ],
        's3' => [
			'access_key' => 'AKIAIRCVNJWPLDLX2PJA',
        	'secret_key' => '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'
        ]
    ]
];
