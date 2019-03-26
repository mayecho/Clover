# 欢迎使用 Clover 框架
## Clover 介绍
Clover 是一个极简 PHP 框架，采用原生风格开发，适用于小型项目和个人开发。如果你是一个极简主义者，那么欢迎回家！
## 安装和配置
1. 下载克隆项目
2. 设置配置php环境
3. 配置`app/Config/App.php`
## URL
### URI 分段
```
http://example.com/index.php/class/method/param1/param2/...
```
如果设置了伪静态，那么可以通过如下访问
```
http://example.com/class/method/param1/param2/...
```
### URI 路由
配置`app/Config/Routes.php`
## 控制器
```php
<?php
namespace app\Controllers;
use \system\Core\Controller;
class ControllerName extends Controller {
	public function __construct() {
		parent::__construct();
	}
	public function index($data) {}
}
```
### 加载视图
视图只能通过控制器加载
加载单个视图
```php
$this->view(viewName, $param);
```
加载多个视图
```php
$this->view([viewName1, viewName2, ...], $param);
```
## 模型
```php
<?php
namespace app\Models;
use \system\Core\Model;
class ModelName extends Model{
	public function __construct() {
		parent::__construct();
	}
	public function modelMethod() {}
}
```
### 加载模型
模型只能通过控制器加载
```php
$this->model('ModelName');
```
通过控制器访问方法
```php
$this->modelName->modelMethod();
```
### 数据库模型
clover数据库采用Medoo, 暴露一个对象
在模型中通过
$this->db->方法;
## 视图函数
### 基本地址
用于加载资源，可选参数，如为空返回当前地址
```php
base_url($uri);
```
### 站点地址
用于页面跳转，如为空返回当前地址
```php
site_url($uri);
```
## 加密
加密函数只能在控制器中使用
### 唯一值
```php
token();
```
返回唯一值
### 密码加密
```php
pwdHash($pwd);
```
$pwd 需要加密的密码
返回加密后的hash值
### 密码验证
```php
pwdCheck($pwd, $hash);
```
$pwd 需要验证的密码
$hash 验证的hash值
如验证成功返回TRUE
## 文件
文件函数只能在控制器中使用
### 文件上传
```php
uploadFile($file, $flieSavePath);
```
$file 通过表单提交的数据
$flieSavePath 可选，保存路径，默认保存在配置中修改

## 框架开发阶段，有问题反馈
在使用中有任何问题，欢迎反馈给我，可以用以下联系方式跟我交流：
邮件：`3855680@qq.com`
微信：`17628085863`
## 捐助开发者
在兴趣的驱动下，写一个免费的东西，有欣喜，也还有汗水，希望你喜欢我的作品，同时也能支持一下。
支付宝：`3855680@qq.com`
