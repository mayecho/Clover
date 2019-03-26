<?php
namespace app\controller;
/**
 * 控制器测试模板
 */
use \system\core\controller;
class ControllerTest extends Controller {
	public function __construct() {
		// 执行父类构造函数
		parent::__construct();
	}
	public function index($param) {
		// 加载控制器
		$this->model('ModelTest');
		// 执行控制器方法
		$data = $this->modelTest->testMethod();
		// 渲染视图
		$this->view(['header','home', 'footer'], $data);
	}
}
