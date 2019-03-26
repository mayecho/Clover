<?php
namespace app\config;
/**
 * 数据库配置
 */
class Database {
	// 数据库配置
	public $db = [
		// 数据库类型
		'database_type' => 'mysql',
		// 数据库名
		'database_name' => 'myweb',
		// 数据库服务器地址
		'server' => 'localhost',
		// 用户名
		'username' => 'root',
		// 用户密码
		'password' => 'root',
		// 数据库编码
		'charset' => 'utf8',
		// 端口号
		'port' => 3306,
		// 表前缀
		'prefix' => 'PREFIX_',
		'logging' => true,
		'socket' => '/tmp/mysql.sock',
		'option' => [
			\PDO::ATTR_CASE => \PDO::CASE_NATURAL
		],
		'command' => [
			'SET SQL_MODE=ANSI_QUOTES'
		]
	];
}
