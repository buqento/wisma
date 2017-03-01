<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
return array(
   'theme'=>'bootstrap',
   'modules'=>array(
     'gii'=>array(
     'generatorPaths'=>array(
     'bootstrap.gii',
     ),
     ),
     ),
   'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Wisma Yuan',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        //YII USER
        'application.modules.user.models.', 
        'application.modules.user.components.',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
    
		 //YII USER
         'user'=>array(
          'tableUsers' => 'tbl_users',
          'tableProfiles' => 'tbl_profiles',
          'tableProfileFields' => 'tbl_profiles_fields',
         ),
    
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'wisma',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
        
//        'user',

    
		
	),

	// application components
	'components'=>array(
     'user'=>array(
       // enable cookie-based authentication
       'allowAutoLogin'=>true,
        
        //YII USER
        'loginUrl' => array('/user/login'),

    
     ),
    

    
  
     'bootstrap'=>array(
     'class'=>'bootstrap.components.Bootstrap',
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

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
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
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
