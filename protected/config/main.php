<?php

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	// autoloading model and component classes
	'import' => array(
		'application.views.*',	
		'application.models.*',	
		'application.components.*',
		'application.controllers.*',
	),
	// application components
	'components' => array(
		'user' => array(
			'allowAutoLogin' => true,
		),
		'urlManager' => array(
			'urlFormat' => 'path',
			'rules' => array(
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			),
		),
		'errorHandler' => array(
			'errorAction' => '/',
		),
		'db' => array(
			'class' => 'system.db.CDbConnection',
			'connectionString' => 'mysql:host=localhost;dbname=calendar',
			'emulatePrepare' => true,
			'username' => 'user',
			'password' => '',
			'charset' => 'utf8',
		),
	),
);