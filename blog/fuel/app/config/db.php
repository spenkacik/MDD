<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
	
	'default' => array(
		'type' => 'mysql',
		'connection' => array(
			'hostname' => '127.0.0.1',
			'port' => '8889',
			'username' => 'root',
			'password' => 'root',
			'database' => 'blog',
			'persistent' => false,
		),
		'identifier' => '`',
		'table_prefix' => '',
		'charset' => 'utf8',
		'enable_cache' => true,
		'profiling' => false,
	),
);
