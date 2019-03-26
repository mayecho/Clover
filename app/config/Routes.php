<?php
namespace app\config;
/**
 * 路由配置
 */
class Routes {
	// 默认控制器
	public $defaultController = 'ControllerTest';
	// 默认方法
	public $defaultMethod = 'index';
	// 自定义路由
	public $routes = [
		'admin' => 'controllerTest/index'
	];
}
