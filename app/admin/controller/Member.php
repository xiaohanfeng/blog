<?php
namespace app\admin\controller;

use think\facade\View;
use think\facade\Db;

class Member extends Admin
{
    public function index($q = '')
    {

        //省份
        if (isset($_REQUEST['province']) && !empty($_REQUEST['province'])) {
            $where['province'] = ['=', $_REQUEST['province']];
            $this->assign('province', $_REQUEST['province']);
        } else {
            $this->assign('province', '');
        }
        //市
        if (isset($_REQUEST['city']) && !empty($_REQUEST['city'])) {
            $where['city'] = ['=', $_REQUEST['city']];
            $this->assign('city', $_REQUEST['city']);
        } else {
            $this->assign('city', '');
        }
        //县区
        if (isset($_REQUEST['area']) && !empty($_REQUEST['area'])) {
            $where['area'] = ['=', $_REQUEST['area']];
            $this->assign('area', $_REQUEST['area']);
        } else {
            $this->assign('area', '');
        }

        $this->assign('provinces', $this->getprovince());
        $this->assign('cities', $this->getcity());
        $this->assign('areas', $this->getarea());
        return View::fetch();
    }

    //获取省份信息
    function getprovince() {
        $provinces = Db::table('blog_provinces')->select();
        return $provinces;
    }

    //获取市信息
    function getcity($provinceid = '') {
        if (!empty($provinceid)) {
            $cities = Db::table('blog_cities')->where('provinceid=' . $provinceid)->select();
        } else if (!empty($_REQUEST['provinceid'])) {
            $cities = Db::table('blog_cities')->where('provinceid=' . $_REQUEST['provinceid'])->select();
        } else {
            $cities = Db::table('blog_cities')->select();
        }
        return $cities;
    }

    //获取县/区信息
    function getarea($cityid = '') {
        if (!empty($cityid)) {
            $areas = Db::table('blog_areas')->where('cityid=' . $cityid)->select();
        } else if (!empty($_REQUEST['provinceid'])) {
            $areas = Db::table('blog_areas')->where('cityid=' . $_REQUEST['cityid'])->select();
        } else {
            $areas = Db::table('blog_areas')->select();
        }
        return $areas;
    }

    //账号设置
    public function account()
    {
        return View::fetch();
    }

    //密码设置
    public function setpwd(){
        if(request()->isAjax()){
            $param = request()->param();

            $data_list = Db::name('user')
                ->where('id',session('userid'))
                ->value('password');

            if($param['']){

            }

            $data['code'] = '0';
            $data['count'] = $data_list['total'];
            $data['data'] = $data_list['data'];
            return json($data);
        }

        return View::fetch();
    }
    
    


}
