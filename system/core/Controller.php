<?php
namespace system\core;
/**
 * 控制器基类
 */
use \app\models\User;
class Controller {
	private $token = NULL;
	public function __construct() {}
	// 加载视图
	public function view($view, $data = NULL) {
		if (is_string($view)) {
			$path = FCPATH . 'app/view/' . $view . '.php';
			if (file_exists($path)) {
				include $path;
			} else {
				if (DEBUG) {
					die('视图加载错误');
				} else {
					die;
				}
			}
		} else if (is_array($view)) {
			foreach ($view as $key => $value) {
				$path = FCPATH . 'app/view/' . $value . '.php';
				if (file_exists($path)) {
					include $path;
				} else {
					if (DEBUG) {
						die('视图加载错误');
					} else {
						die;
					}
				}
			}
		}
	}
	// 加载模型
	public function model($model) {
		$space = 'app\model\\' . $model;
		$modelObjectName = lcfirst($model);
		$this->$modelObjectName = new $space();
	}
	// token
	public function token() {
		return md5(time());
	}
	// 密码加密
	public function pwdHash($pwd) {
		return password_hash($pwd, PASSWORD_ARGON2I);
	}
	// 密码验证
	public function pwdCheck($pwd, $hash) {
		if (password_verify($pwd, $hash)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	// 文件上传
	public function uploadFile($file, $flieSavePath = NULL) {
		$app = new \app\config\App;
		if ($_FILES[$file]["error"] === 0) {
			if (strpos($_FILES[$file]["name"], '.') !== FALSE) {
				$temp = explode('.', $_FILES[$file]["name"]);
				$extension = end($temp);
			} else {
				$extension = '';
			}
			if (in_array($extension, $app->allowedExts) && $_FILES[$file]['size'] < $app->fileSize) {
				$flieSavePath = (empty($flieSavePath) ? $app->fileSavePath : $flieSavePath) . date("Ymdhis") . (!empty($extension) ? '.' : '') . $extension;
				$path = FCPATH . 'public/' . $flieSavePath;
				if (!file_exists($path)) {
					move_uploaded_file($_FILES[$file]["tmp_name"], $path);
					return $flieSavePath;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
	// 文件下载

}
