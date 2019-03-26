<?php
namespace system;
/**
 * 程序开始
 */
class App {
    // 唯一实例
    private static $instance = NULL;
    public function __construct() {}
    // 运行（请求分发）
    public function run() {
// 路由
        $routes = new \app\config\Routes();
        // 获取地址栏信息
        $uri = str_replace('index.php', '', $_SERVER['REQUEST_URI']);
        // 自定义路由
        foreach ($routes->routes as $key => $value) {
            $uri = str_replace($key, $value, $uri);
        }
        // 去除首尾分割线
        $uri = trim($uri, '/');
        // 解析地址
        $uriArray = explode('/', $uri);
        $controller = ucfirst(!empty($uriArray[0]) ? $uriArray[0] : $routes->defaultController);
        $method = !empty($uriArray[1]) ? $uriArray[1] : $routes->defaultMethod;
        $param = array_slice($uriArray, 2);
        $space = '\app\controller\\' . $controller;
        // 执行控制器
        $ctr = new $space;
        if (method_exists($ctr, $method)) {
            $ctr->$method($param);
        } else {
            if (DEBUG) {
                die('控制器方法不存在');
            } else {
                die;
            }
        }
    }
    // 单例模式
    public static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
            return self::$instance;
        }
    }
}
