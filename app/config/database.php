<?php

return
[
	/*
	 * ---------------------------------------------------------
	 * Default
	 * ---------------------------------------------------------
	 *
	 * Default configuration to use.
	 */
	'default' => 'mysql',

	/*
	 * ---------------------------------------------------------
	 * Configurations
	 * ---------------------------------------------------------
	 *
	 * You can define as many database configurations as you want.
	 *
	 * dsn        : PDO data source name
	 * username   : (optional) Username of the database server
	 * password   : (optional) Password of the database server
	 * persistent : (optional) Set to true to make the connection persistent
	 * log_queries: (optional) Enable query logging?
	 * reconnect  : (optional) Should the connection automatically be reestablished?
	 * options    : (optional) An array of PDO options
	 * queries    : (optional) Queries that will be executed right after a connection has been made
	 */
	'configurations' =>
	[
		'mysql' =>
		[
			'dsn'         => 'mysql:dbname=mako_hotwired;host=localhost;port=3306',
			'username'    => 'root',
			'password'    => '',
			'persistent'  => false,
			'log_queries' => false,
			'reconnect'   => false,
			'queries'     =>
			[
				'SET NAMES utf8mb4',
			],
		],

		'sqlite' =>
		[
			'dsn'         => 'sqlite:' . MAKO_APPLICATION_PATH . '/storage/database/test.sqlite',
			'log_queries' => false,
			'reconnect'   => false,
			'queries'     =>
			[
				"PRAGMA encoding = 'UTF-8'",
			],
		],
	],
];
