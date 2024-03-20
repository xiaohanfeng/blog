<?php
namespace app\index\controller;

use app\BaseController;
use think\App;
use think\facade\View;
use think\facade\Db;
use think\exception\ValidateException;
use think\Request;
use think\facade\Session;


class Users extends BaseController
{
    public function __construct(App $app){
        parent::__construct($app);
        if(cookie('userid') && cookie('username')){
            //将用户信息记录到session数据
            Session::set('userid', cookie('userid'));
            Session::set('username', cookie('username'));
        }
    }

    public function login()
    {
        if(isset($_POST['dosubmit']) && $_POST['dosubmit']){
            $username = trim($_POST['username']);
            $userinfo = Db::name('user')->where("username = '".$username."' and password = '".md5($_POST['password'])."'")->find();
            if($userinfo){
                //更新用户登陆时间和最后登录时间
                $updata['id'] = $userinfo['id'];
                $updata['login_time'] = date('Y-m-d H:i:s');
                $updata['last_login_time'] = $userinfo['login_time'];
                Db::name('user')->save($updata); // 更新数据
                $this->dologin($userinfo);

                if($_POST['autologin']){
                    cookie('userid', $userinfo['id'], 3600*24*7); //7天内免输入
                    cookie('username', $username, 3600*24*7); //7天内免输入
                }

                $this->success("恭喜您，登陆成功！","/");
            }else{
                $this->error("用户名或者密码有误");
            }
        }

        return View::fetch();
    }

    //将用户信息记录到session数据
    public function dologin($userinfo){
        if($userinfo){
            //将用户信息记录到session数据
            Session::set('userid', $userinfo['id']);
            Session::set('username', $userinfo['username']);
        }
    }

    public function register(Request $request)
    {
        if(isset($_POST['dosubmit']) && $_POST['dosubmit']){
            $check = $request->checkToken('__token__');
            if(false === $check) {
                throw new ValidateException('invalid token');
            }

            $inData['username'] = trim($_POST['username']);
            $inData['password'] = md5($_POST['password']); //用户密码md5加密
            $inData['login_time'] = $inData['last_login_time'] = date('Y-m-d H:i:s');
            $userid = Db::name('user')->strict(false)->insertGetId($inData); // 写入数据
            if(is_numeric($userid) && $userid>0){
                $userinfo['id'] =  $userid;
                $userinfo['username'] =  $inData['username'];
                $this->dologin($userinfo);
                $this->success("恭喜您，注册成功！","/",3);
            }else{
                $this->error("抱歉，注册失败！");
            }
        }

        return View::fetch();
    }

    //退出登陆
    public function logout(){
        Session::clear();
        cookie('userid', null);
        cookie('username', null);
        $this->success("成功退出登陆！Bye","/",1);
    }


}
