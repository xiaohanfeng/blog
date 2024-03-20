<?php
namespace app\admin\controller;

use think\facade\View;
use think\facade\Db;

/**
 * Class Configs
 * @package app\admin\controller\system
 * @ControllerAnnotation(title="网站配置项")
 */
class Configs extends Admin
{
    public function index($q = ''){
        if(request()->isAjax()){
            $param = request()->param();

            $map = array();
            if(isset($param['key']) && $param['key']){
                if($param['key']['title']){
                    $map[] = ['title','like','%'.trim($param['key']['title']).'%'];
                }
            }

            $data_list = Db::name('link')
                ->where($map)
                ->order('created_time desc')
                ->paginate(10)->toArray();

            $data['code'] = '0';
            $data['count'] = $data_list['total'];
            $data['data'] = $data_list['data'];
            return json($data);
        }

        View::assign('current_url',request()->url());
        return View::fetch();
    }

    public function add()
    {
        if(request()->isAjax()){
            $param = request()->param();
            $insdata['href'] = trim($param['href']);
            $insdata['title'] = trim($param['title']);
            $insdata['status'] = $param['status'] == 'on'?'1':'0';
            $insdata['author_id'] = session('userid');
            $insdata['weight'] = trim($param['weight']);
            $ins = Db::name('link')->insert($insdata);
            if($ins){
                $data['status'] = '1';
            }else{
                $data['status'] = '0';
            }
            return json($data);
        }

        return View::fetch();
    }

}
