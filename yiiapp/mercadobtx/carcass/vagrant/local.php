<?php
/**
 * This is the local config for Vagrant-encapsulated machine.
 */
return array(
	'components' => array(
		'db' => array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=boilerplate',
			'username' => 'root',
			'password' => 'mysqlroot'
		)
	)
);