<?php
use think\facade\Route;

Route::rule('/', 'index'); // 首页访问路由

Route::group('index',function () {
    Route::get('/clear', 'Index/clear');
});

//内容管理
Route::group('content',function () {
    Route::rule('/post', 'Content/post');
    Route::get('/list', 'Content/index');
    Route::get('/tags', 'Content/tags');
    Route::get('/series', 'Content/series');
    Route::post('/series_info', 'Content/series_info');
    Route::post('/series_save', 'Content/series_save');
    Route::get('/category', 'Content/category');
    Route::post('/upload', 'Content/upload');
    Route::post('/md_upload', 'Content/md_upload');
    Route::post('/getdata', 'Content/getdata');
    Route::post('/cate_classify', 'Content/cate_classify');
    Route::post('/deal_cate', 'Content/deal_cate');
    // 路由到模板文件
    Route::view('post_tag', 'content/post_tag');
    Route::view('classify', 'content/classify');
});
Route::group('content',function () {
    Route::post('/add', 'Content/add_ajax');
    Route::post('/del', 'Content/del_ajax');
})->append(['table' => 'article']);



Route::group('member',function () {
    Route::get('/info', 'Member/index');
    Route::get('/account', 'Member/account');
    Route::post('/getcity', 'Member/getcity')->ajax();
    Route::post('/getarea', 'Member/getarea')->ajax();
    // 路由到模板文件
    Route::rule('setpwd', 'Member/setpwd');
    Route::view('setmobile', 'Member/setmobile');
    Route::view('setemail', 'Member/setemail');
});

Route::group('database',function () {
    Route::get('/index', 'Database/index');
});

Route::group('resume',function () {
    Route::get('/index', 'Resume/index');
});

Route::group('configs',function () {
    Route::get('/links', 'Configs/index');
    Route::get('/datalist', 'Configs/datalist');
    Route::rule('/add', 'Configs/add');
});
Route::group('configs',function () {
    Route::post('/add', 'Configs/add_ajax');
    Route::post('/edit', 'Configs/setitem_ajax');
    Route::post('/del', 'Configs/del_ajax');
})->append(['table' => 'link']);


//通用路由
Route::group('deal',function () {
    Route::post('/add', 'Configs/add_ajax');
    Route::post('/edit', 'Configs/setitem_ajax');
    Route::post('/del', 'Configs/del_ajax');
});