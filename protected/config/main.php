<?php

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	// application components
	'components'=>array(
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'errorHandler'=>array(
			'errorAction'=>'/',
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=calendar',
			'emulatePrepare' => true,
			'username' => 'user',
			'password' => '',
			'charset' => 'utf8',
		),
	),
);