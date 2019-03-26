<?php
// 基本地址（用于加载资源）
function base_url($uri = NULL) {
	$app = new \app\Config\App;
	if (!empty($uri)) {
		return $app->baseURL . trim($uri, '/');
	} else {
		return rtrim($app->baseURL, '/');
	}
}
// 站点地址（用于站点跳转）
function site_url($uri = NULL) {
	$app = new \app\Config\App;
	if (!empty($uri)) {
		return $app->baseURL . $app->indexPage . (!empty($app->indexPage) ? '/' : '') . trim($uri, '/');
	} else {
		return $app->baseURL . $app->indexPage;
	}
}
