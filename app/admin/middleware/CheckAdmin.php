<?php

// +----------------------------------------------------------------------
// | EasyAdmin
// +----------------------------------------------------------------------
// | PHP交流群: 763822524
// +----------------------------------------------------------------------
// | 开源协议  https://mit-license.org 
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/zhongshaofa/EasyAdmin
// +----------------------------------------------------------------------

namespace app\admin\middleware;

use think\Request;


/**
 * 检测用户登录和节点权限
 * Class CheckAdmin
 * @package app\admin\middleware
 */
class CheckAdmin
{
    use \app\common\traits\JumpTrait;

    public function handle(Request $request, \Closure $next)
    {

        $adminId = session('userid');
        //$expireTime = session('admin.expire_time');

        // 验证登录
        empty($adminId) && $this->error('请先登录', [], '/index/login');
        // 判断是否登录过期
//        if ($expireTime !== true && time() > $expireTime) {
//            session('admin', null);
//            $this->error('登录已过期，请重新登录', [], __url('admin/login/index'));
//        }


        return $next($request);
    }

}