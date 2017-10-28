<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'CalendarioWEB',
    // preloading 'log' component
    'preload' => array('log', 'booster',),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.models.calendario.*',
        'application.models.user.*',
        'application.components.*',
        'application.modules.cruge.components.*',
        'application.funciones.*',
        'application.modules.cruge.extensions.crugemailer.*',
    ),
    'modules' => array(
        'cruge' => array(
            'tableprefix' => 'cruge_',
            'availableAuthMethods' => array('default'),
            'availableAuthModes' => array('username', 'email'),
            'baseUrl' => 'http://coco.com/',
            'debug' => FALSE,
            'rbacSetupEnabled' => true,
            'allowUserAlways' => false,
            'useEncryptedPassword' => true,
            'hash' => 'md5',
            'afterLoginUrl' => null,
            'afterLogoutUrl' => null,
            'afterSessionExpiredUrl' => null,
            'afterLoginUrl' => array('/site/Index'),
            'registrationLayout' => '//layouts/column2',
            'activateAccountLayout' => '//layouts/column2',
            'editProfileLayout' => '//layouts/column2',
            'generalUserManagementLayout' => 'ui',
            'userDescriptionFieldsArray' => array('email', 'cedula', 'nombres'),
        ),
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'generatorPaths' => array(
                'booster.gii'
            ),
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
//        'user' => array(
//            // enable cookie-based authentication
//            'allowAutoLogin' => true,
//        ),
//        
        'user' => array(
            'allowAutoLogin' => true,
            'class' => 'application.modules.cruge.components.CrugeWebUser',
            'loginUrl' => array('/cruge/ui/login'),
        ),
        'authManager' => array(
            'class' => 'application.modules.cruge.components.CrugeAuthManager',
        ),
        'crugemailer' => array(
            'class' => 'application.modules.cruge.components.CrugeMailer',
            'mailfrom' => 'email-desde-donde-quieres-enviar-los-mensajes@xxxx.com',
            'subjectprefix' => 'Tu Encabezado del asunto - ',
            'debug' => true,
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => true,
        ),
        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>array(
          'urlFormat'=>'path',
          'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
          ),
         */
        'db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'pgsql:host=localhost;dbname=agenda',
            'emulatePrepare' => false,
            'username' => 'postgres',
            'password' => '123456',
//            'schemaCachingDuration' => 3600,
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'booster' => array(
            'class' => 'ext.booster.components.Booster',
            'responsiveCss' => true,
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
    'language' => 'es',
    'sourceLanguage' => 'en',
//    esto para poner el login como inicio//
    'defaultController' => 'cruge/ui/login',
);

