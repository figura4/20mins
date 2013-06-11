<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'20 minutes into the future...',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.CAdvancedArBehavior',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'pwdfuffa',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array($_SERVER['REMOTE_ADDR'],'127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'recensioni/libri'=>'review/list',
				'recensioni/libri/<id:\d+>/<title:\w+>'=>'review/view',
				'recensioni/tv'=>'review/list',
				'recensioni/tv/<id:\d+>/<title:\w+>'=>'review/view',
				'recensioni/film'=>'review/list',
				'recensioni/film/<id:\d+>/<title:\w+>'=>'review/view',
				'recensioni/categorie'=>'tag/list',
				'recensioni/categorie/<id:\d+>/<tag:\w+>'=>'tag/view',
				'post'=>'content/list',
				'post/<id:\d+>/<title:\w+>'=>'content/view',
				'login'=>'site/login',
				'rss'=>'feed/rss',
				'sitemap'=>'feed/sitemap',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;unix_socket=/var/run/mysqld/mysqld.sock;dbname=20mins',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'pwdfuffa',
			'tablePrefix' => 'tbl_',
			'charset' => 'utf8',
			'enableProfiling' => true,
			'enableParamLogging' => true,
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				array(
					'class'=>'CWebLogRoute',
				),
				array(
						'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
						'ipFilters'=>array('127.0.0.1','192.168.56.1'),
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'siteDescription'=>'Viaggio nel mondo della letteratura e cinematografia fantastica. Fantascienza, fantasy, romanzi, film, serie tv. Recensioni e note biografiche sugli autori.',
		'authorPicsPath'=>'/images/authors/',
		'imagesPath' => '/images/images/',
		'coversPath' => '/images/covers/',
		'avatarsPath' => '/images/avatars/',
	),
);