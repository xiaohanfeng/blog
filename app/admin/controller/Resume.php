<?php
namespace app\admin\controller;

use think\facade\View;
use think\facade\Db;
use app\admin\model\ResumeModel;


class Resume extends Admin
{

    public function index($q = ''){
        $user = new ResumeModel;
        $data = $user->getResumeInfo('6203672d43c5d756de9b400c');

        View::assign('current_url',request()->url());
        return View::fetch();
    }


}
