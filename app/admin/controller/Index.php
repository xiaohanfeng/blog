<?php
namespace app\admin\controller;

use app\BaseController;
use think\facade\View;
use think\facade\Db;
use think\facade\Log;

class Index extends BaseController
{
    public function index()
    {
        return View::fetch();
    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }

    /**
     * 清理缓存
     */
    public function clear() {
        Log::clear();
        if (del_dir(runtime_path())) {
            $this->success("缓存清理成功！！");
        }
        $this->error("(⊙o⊙)…缓存清理失败");
    }
}
