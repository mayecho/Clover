<?php
namespace system\core;
/**
 * 模型基类
 */
class Model {
	// 数据库连接对象
	public $db = NULL;
	public function __construct() {
		$this->db = new \system\database\Medoo((new \app\config\database())->db);
	}
}
