<?php
use think\facade\Route;

Route::group(function () {
    Route::rule('/', 'index'); // 首页访问路由
    Route::rule('search', 'search'); // 搜索
    Route::rule('login', 'Users/login')->token(); // 登录，并验证 token 令牌
    Route::rule('register', 'Users/register'); // 注册
    Route::rule('logout', 'Users/logout'); // 退出
    Route::get('detail/<id>','Index/detail')->name('detail'); // 定义GET请求路由规则
    Route::get('cate/<id>','Index/category'); // 定义GET请求路由规则
    Route::get('series/<id>','Index/series'); // 定义GET请求路由规则
});
