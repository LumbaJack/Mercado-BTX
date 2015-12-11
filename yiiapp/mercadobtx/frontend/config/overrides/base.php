<?php
/**
 * Base overrides for frontend application
 */
return [
    // So our relative path aliases will resolve against the `/frontend` subdirectory and not nonexistent `/protected`
    'basePath' => 'frontend',
    'import' => [
        'application.controllers.*',
        'application.controllers.actions.*',
        'common.actions.*',
    ],
    'controllerMap' => [
        // Overriding the controller ID so we have prettier URLs without meddling with URL rules
        'site' => 'FrontendSiteController'
    ],
    'components' => [
        // Backend uses the YiiBooster package for its UI
        'bootstrap' => [
            // `bootstrap` path alias was defined in global init script
            'class' => 'bootstrap.components.Bootstrap'
        ],
	'errorHandler' => [
            // Installing our own error page.
            'errorAction' => 'site/error'
        ],
        'urlManager' => [
            // Some sane usability rules
            'rules' => [
                'ingresar' => 'login',
                'cerrar_sesion' => 'logout',
                'registro' => 'signup',
                'compra_venta_bitcoins' => 'buysell',
                'invertir_bitcoins' => 'invest',
                'transacciones_bitcoins' => 'transactions',
                'enviar_recibir_bitcoins' => 'sendreceive',
                'que_es_bitcoin' => 'whatIsBitcoin',
                'privacidad' => 'privacy',
                'terminos_y_condiciones' => 'terms',
                'contactanos' => 'contactus',
                'preguntas_frecuentes' => 'faqs',
                'mapa_del_sitio' => 'sitemap',
                'registro' => 'signup',
                'usuario/mi_cuenta' => 'user/account',
                'usuario/recuperar' => 'user/recovery',

                'oqueebitcoin' => 'whatIsBitcoin',
                'comprarvender' => 'buysell',
                'investir' => 'invest',
                'inscrever-se' => 'signup',
                'login_pt' => 'login',
                'salir' => 'logout',
                'perguntas_e_respostas' => 'faqs',
                'privacidade' => 'privacy',
                'condicoes' => 'terms',
                'contactos' => 'contactus',
                'enviarreceber' => 'sendreceive',
                'comprarvender' => 'buysell',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

                // Your other rules here...
            ]
        ],
    ],
];
