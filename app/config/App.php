<?php
namespace app\config;
/**
 * 网站基本配置
 */
class App {
	// 站点URL（带协议和尾斜杠）
	public $baseURL = 'http://myweb.io/';
	// public $baseURL = 'http://setme.cn/';
	// 如果您使用mod_rewrite，请设置为空
	public $indexPage = 'index.php';
	// 允许上传文件后缀
	public $allowedExts = ['gif', 'jpg', 'png', 'html', 'mp3'];
	// 允许上传文件大小(默认2MB)
	public $fileSize = 2097152;
	// 默认文件上传路径
	public $fileSavePath = 'upload/';
}
