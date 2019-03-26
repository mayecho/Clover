<?php
// 网站根目录
define('FCPATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// 是否开启调试（生产模式请设置为 FALSE）
define('DEBUG', TRUE);
// 自动加载
spl_autoload_register(function ($class) {
	$path = FCPATH . $class . '.php';
	if (file_exists($path)) {
		include $path;
	} else {
		if (DEBUG) {
			die('自动加载错误');
		} else {
			die;
		}
	}
});
// 加载全局函数
include FCPATH . 'system/function.php';
// 运行
\system\App::getInstance()->run();
