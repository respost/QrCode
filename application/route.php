<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
//路由别名
Route::alias([
'index'=>'index/index',
'main'=>'index/main',
]);
//路由规则
Route::rule([
	'/'				=>	'index/index',
	'uploads/:pay'	=> 	'index/uploads',
	'qr/:id'		=> 	'index/qr',
	'make'			=> 	'index/make',
	'api'	        => 	'index/api',
	'code/:id'		=> 	'index/code',
	'poster/:id'	=> 	'index/poster',
]);