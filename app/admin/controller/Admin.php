<?php

namespace app\admin\controller;

use app\BaseController;
use think\facade\Session;
use think\facade\View;
use think\facade\Db;

/**
 * 后台通用控制器
 * （所有后台控制器继承Admin）
 */
class Admin extends BaseController{

    private $name;
    public $c_menu = []; //当前节点信息

    /**
     * 初始化构造函数
     */

    protected function _initialize() {
        if(cookie('userid') && cookie('username')){
            //将用户信息记录到session数据
            Session::set('userid', cookie('userid'));
            Session::set('username', cookie('username'));
        }
        var_dump("123");
        View::assign('current_url',request()->url());
    }

    /**
     * 通用主页
     * @param string $model 模型，格式：[模块名]/模型名 或 [模块名]_模型名
     * @param string $scene 自动验证场景，默认为不验证
     *
     */
    public function index($q = '') {
        //列表过滤器，生成查询Map对象
        $map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map, $q);
        }
        $name = $this->getActionName();
        $model = Db::name($name);
        if (!empty($model)) {
            $this->_list($model, $map);
        }
        return View::fetch();
    }

    /**
     * 获取控制器名称
     * @param string $model 模型，格式：[模块名]/模型名 或 [模块名]_模型名
     * @param string $scene 自动验证场景，默认为不验证
     *
     */
    protected function getActionName() {

        if (empty($this->name)) {
            // 获取Action名称
            $name = substr(get_class($this), 0, -10);

            $list = explode('\\', $name);
            $this->name = $list[3];
        }
        return $this->name;
    }

    /**
     * 获取模块名称
     *
     */
    protected function getModuleName() {
        //1、普通方式获取
        //$module = app('http')->getName();

        //2、多应用模式下获取
        $module = \think\facade\App::initialize()->http->getName();
        return $module;
    }

    /**
    +----------------------------------------------------------
     * 根据表单生成查询条件
     * 进行列表过滤
    +----------------------------------------------------------
     * @access protected
    +----------------------------------------------------------
     * @param string $name 数据对象名称
    +----------------------------------------------------------
     * @return HashMap
    +----------------------------------------------------------
     * @throws ThinkExecption
    +----------------------------------------------------------
     */
    protected function _search($name = '') {
        //生成查询条件
        if (empty($name)) {
            $name = $this->getActionName();
        }
        $model = db($name);
        $map = array();
        foreach ($model->getTableFields() as $key => $val) {
            if (isset($_REQUEST [$val]) && $_REQUEST [$val] != '') {
                $map [$val] = $_REQUEST [$val];
            }
        }
        return $map;
    }

    /**
    +----------------------------------------------------------
     * 根据表单生成查询条件
     * 进行列表过滤
    +----------------------------------------------------------
     * @access protected
    +----------------------------------------------------------
     * @param Model $model 数据对象
     * @param HashMap $map 过滤条件
     * @param string $sortBy 排序
     * @param boolean $asc 是否正序
    +----------------------------------------------------------
     * @return void
    +----------------------------------------------------------
     * @throws ThinkExecption
    +----------------------------------------------------------
     */
    protected function _list($model, $map, $sortBy = '', $asc = false) {
        //排序字段 默认为主键名
        if (!empty($this->request->param('_order'))) {
            $order = $this->request->param('_order');
        } else {
            $order = !empty($sortBy) ? $sortBy : $model->getPk();
        }
        //排序方式默认按照倒序排列order('id','desc') 或者 order(['id'=>'desc','create_time'=>'desc'])
        //接受 sost参数 0 表示倒序 非0都 表示正序
        if (!empty($this->request->param('_sort'))) {
            $sort = $this->request->param('_sort');
        } else {
            $sort = $asc ? 'asc' : 'desc';
        }
        //取得满足条件的记录数
        $count = $model->where($map)->count();
        if ($count > 0) {
            //创建分页对象
            $data_list = $model->where($map)->order($order, $sort)->paginate(10, false, ['query' => input('param.')]);
            // 分页
            $pages = $data_list->render();
            $this->assign('data_list', $data_list);
            $this->assign('pages', $pages);
        }
        return;
    }

    /**
     * 通用添加
     * @param string $model 模型，格式：[模块名]/模型名 或 [模块名]_模型名
     * @param string $scene 自动验证场景，默认为不验证
     *
     */
    public function add() {
        if ($this->request->isPost()) {
            $modelName = $this->request->param('tps_model');
            $table = $this->request->param('tps_table');
            $scene = $this->request->param('tps_scene', false);
            $postData = $this->request->post();
            if (isset($postData['tps_model'])) {
                unset($postData['tps_model']);
            }
            if (isset($postData['tps_table'])) {
                unset($postData['tps_table']);
            }
            if (isset($postData['tps_scene'])) {
                unset($postData['tps_scene']);
            }
            if ($modelName) {
                if (strpos($modelName, '/') === false) {
                    $modelName = $this->getModuleName() . '/' . $modelName;
                }
                $model = model($modelName);
                if ($scene) {
                    $validate = validate($modelName);
                    if (!$validate->scene($scene)->check($postData)) {
                        $this->error($validate->getError());
                    }
                }
                if (!$model->validate(false)->save($postData)) {
                    $this->error($model->getError());
                }
            } else if ($table) {
                if (!Db::name($table)->insert($postData)) {
                    $this->error('保存失败');
                }
            } else {
                $this->error('缺少参数（tps_model、tps_table至少传一个）');
            }

            $this->success('保存成功', '');
        }

        $template = $this->request->param('template', 'form');
        return $this->fetch($template);
    }

    /**
     * 通用添加
     * @param string $model 模型，格式：[模块名]/模型名 或 [模块名]_模型名
     * @param string $scene 自动验证场景，默认为不验证
     *
     */
    public function add_ajax() {
        if (request()->isAjax()) {
            $table = request()->param('table');
            $postData = request()->post();

            if (isset($postData['table'])) {
                unset($postData['table']);
            }
            $postData['author_id'] = session('userid');

            if ($table) {
                //strict:false, 不存在字段的值将会直接抛弃
                if (!Db::name($table)->strict(false)->insert($postData)) {
                    $this->error('保存失败');
                }
            } else {
                $this->error('缺少参数');
            }
            $this->success('保存成功!');
        }
        $this->error('非法请求');

    }

    /**
     * 通用修改
     * @param string $model 模型，格式：[模块名]/模型名 或 [模块名]_模型名
     * @param string $scene 自动验证场景，默认为不验证
     *
     *
     */
    public function edit() {
        $modelName = $this->request->param('tps_model');
        $table = $this->request->param('tps_table');
        if ($modelName) {
            if (strpos($modelName, '/') === false) {
                $modelName = $this->getModuleName() . '/' . $modelName;
            }
            $model = model($modelName);
            $pk = $model->getPk();
            $id = $this->request->param($pk);
            if ($this->request->isPost()) {
                $postData = $this->request->post();
                $scene = $this->request->param('tps_scene', false);
                if (isset($postData['tps_model'])) {
                    unset($postData['tps_model']);
                }
                if (isset($postData['tps_scene'])) {
                    unset($postData['tps_scene']);
                }
                if ($scene) {
                    $validate = validate($modelName);
                    if (!$validate->scene($scene)->check($postData)) {
                        $this->error($validate->getError());
                    }
                }
                if (!$model->validate(false)->save($postData, [$pk => $id])) {
                    $this->error($model->getError());
                }
                $this->success('保存成功', '');
            }
            $formData = $model->get($id);
        } else if ($table) {
            $db = Db::name($table);
            $pk = $db->getPk();
            $id = $this->request->param($pk);
            if ($this->request->isPost()) {
                $postData = $this->request->post();
                if (isset($postData['tps_table'])) {
                    unset($postData['tps_table']);
                }
                if (isset($postData['tps_scene'])) {
                    unset($postData['tps_scene']);
                }
                if (!$db->where($pk, $id)->update($postData)) {
                    $this->error('保存失败');
                }
                $this->success('保存成功', '');
            }

            $formData = $db->where($pk, $id)->find();
        } else {
            $this->error('缺少参数（tps_model、tps_table至少传一个）');
        }
        $this->assign('data_info', $formData);
        $template = $this->request->param('template', 'form');
        return $this->fetch($template);
    }

    /**
     * 通用修改
     * @param string $model 模型，格式：[模块名]/模型名 或 [模块名]_模型名
     * @param string $scene 自动验证场景，默认为不验证
     *
     *
     */
    public function edit_ajax() {
        $table = $this->request->param('tps_table');
        if ($this->request->isAjax() && $table) {
            $db = Db::name($table);
            $pk = $db->getPk();
            $id = $this->request->param($pk);

            $postData = $this->request->post();
            if (isset($postData['tps_table'])) {
                unset($postData['tps_table']);
            }

            if (!$db->where($pk, $id)->update($postData)) {
                $data['status'] = '0';
                $data['msg'] = '保存失败';
            }
            $data['status'] = '1';
            $data['msg'] = '保存成功';
            return json($data);

        }
        $data['status'] = '-1';
        $data['msg'] = '非法请求';
        return json($data);
    }


    /**
     * 通用删除
     * 单纯的记录删除
     *
     *
     */
    public function del() {
        $ids = input('param.ids/a') ? input('param.ids/a') : input('param.id/a');
        $table = input('param.table');
        if (empty($ids)) {
            $this->error('无权删除(原因：可能您选择的是系统菜单)');
        }
        // 禁止以下表通过此方法操作
        if ($table == 'admin_user' || $table == 'admin_role') {
            $this->error('非法操作');
        }

        // 以下表操作需排除值为1的数据
        if ($table == 'admin_menu' || $table == 'admin_module') {
            if ((is_array($ids) && in_array('1', $ids))) {
                $this->error('禁止操作');
            }
        }

        // 获取主键
        $pk = Db::name($table)->getPk();
        $map = [];
        $map[$pk] = ['in', $ids];

        $res = Db::name($table)->where($map)->delete();
        if ($res === false) {
            $this->error('删除失败');
        }
        $this->success('删除成功');
    }

    /**
     * 通用删除
     * 单纯的记录删除
     *
     *
     */
    public function del_ajax() {
        $param = request()->param();
        $ids = explode(',',$param['ids']);
        $table = $param['table'];
        if (empty($ids)) {
            $this->error('无权删除(原因：可能您选择的是系统菜单)');
        }

        $res = Db::name($table)->delete($ids);
        if ($res === false) {
            $this->error('删除失败');
        }
        $this->success('删除成功');
    }

    /**
     * 通用设置某一字段
     */
    public function setitem_ajax() {
        if(request()->isAjax()){
            $param = request()->param();
            $table = $param['table'];
            unset($param['table']);
            $res = Db::name($table)->update($param);
            if ($res === false) {
                $this->error('设置失败');
            }
            $this->success('设置成功');
        }
    }

    public function assign($dataK, $dataV){
        return View::assign($dataK,$dataV);
    }
    public function fetch($template){
        return View::fetch($template);
    }

}
