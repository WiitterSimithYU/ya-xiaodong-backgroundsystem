<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

$db_params = dirname ( __FILE__ ) .'/db_params.php';
require_once ($db_params);


return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => '联合利华问卷调查',

	// preloading 'log' component
	'preload' => array('log'),

	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
		'application.biz.*',
	),

	'modules'=>array(
				// uncomment the following to enable the Gii tool
				'gii'=>array(
						'class'=>'system.gii.GiiModule',
						'password'=>'111111',
						// If removed, Gii defaults to localhost only. Edit carefully to taste.
						'ipFilters'=>array('127.0.0.1','::1'),
				),
		),

	'defaultController' => 'home',

		'modules' => array(
				// uncomment the following to enable the Gii tool

				'gii' => array(
						'class' => 'system.gii.GiiModule',
						'password' => '111111',
						// If removed, Gii defaults to localhost only. Edit carefully to taste.
						'ipFilters' => array('127.0.0.1', '::1'),
				),

		),

	// application components
	'components' => array(
		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
		),
		// 'db' => array(
		// 	'connectionString' => 'sqlite:../protected/data/blog.db',
		// 	'tablePrefix' => 'tbl_',
		// ),
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => "mysql:host=$dbhost;dbname=$dbname",
			'emulatePrepare' => true,
			'username' => $username,
			'password' => $password,
			'charset' => 'utf8',
		),

		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'home/error',
		),
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'urlSuffix' => '.html',
			'rules' => array(
				'post/<id:\d+>/<title:.*?>' => 'post/view',
				'posts/<tag:.*?>' => 'post/index',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			),
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
	'params' => require (dirname(__FILE__) . '/params.php'),
);
