<?php
namespace app\admin\controller;

use think\facade\View;
use think\facade\Db;


class Content extends Admin
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

            $data_list = Db::name('article')
                ->where($map)
                ->where('author_id',session('userid'))
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

    public function post_bak()
    {
        if(request()->isPost()){ //数据保存
            $param = request()->param();

            if($param['save_draft'] == 'draft'){ //保存草稿
                $insdata['author_id'] = session('userid');
                $insdata['title'] = $param['title'];
                $insdata['content'] = $param['content-editormd-markdown-doc']; //内容
                $insdata['pic'] = $param['pic']; //封面图
                $res = Db::name('article')->save($insdata);

                if($res){
                    $this->success("保存成功！",'/admin/content/list');
                }else{
                    $this->error("(⊙o⊙)…保存失败");
                }
            }else{  //发表
                $tags_ids = $this->noIssetInsert($param['tag'],'tag');
                $category_id = $this->noIssetInsert($param['cate'],'category');

                $publish = false;
                // 启动事务
                Db::startTrans();
                try {
                    $insdata['author_id'] = session('userid');
                    $insdata['title'] = $param['title'];
                    $insdata['content'] = $param['content-editormd-markdown-doc']; //内容
                    $insdata['pic'] = $param['pic']; //封面图
                    $insdata['category_id'] = $category_id;
                    $article_id = Db::name('article')->insertGetId($insdata);
                    foreach ($tags_ids as $k => $v){
                        $dataIns['article_id'] = $article_id;
                        $dataIns['tag_id'] = $v;
                        Db::name('article_tags')->insert($dataIns);
                    }

                    // 提交事务
                    Db::commit();
                    $publish = true;
                } catch (\Exception $e) {
                    // 回滚事务
                    Db::rollback();
                    $errMsg = $e->getMessage();
                }

                if($publish){
                    $this->success("发布成功！",'/admin/content/list');
                }else{
                    $this->error("(⊙o⊙)…发布失败，".$errMsg);
                }
            }

        }else if(request()->isGet() && request()->param('id')){  //修改页面
            $param = request()->param();
            $id = $param['id'];
            $data = Db::name('article')->where('id',$id)->find();
            View::assign('data',$data);
        }else{ //新增页面
            $data['title'] = '';
            $data['content'] = '';
            $data['pic'] = '';
            View::assign('data',$data);
        }
        return View::fetch();
    }

    public function post()
    {
        if(request()->isPost()){ //数据提交
            $param = request()->param();
            if(request()->param('artid')){ //更新
                $this->update($param);
            }else{  //新增
                $this->insert($param);
            }

        }else if(request()->isGet() && request()->param('artid')){  //修改页面
            $param = request()->param();
            $id = $param['artid'];
            $data = Db::name('article')->where('id',$id)->find();
            View::assign('data',$data);
        }else{ //新增页面
            $data['title'] = '';
            $data['content'] = '';
            $data['pic'] = '';
            View::assign('data',$data);
        }

        return View::fetch();
    }

    public function insert($param){
        if($param['save_draft'] == 'draft'){ //保存草稿
            $insdata['author_id'] = session('userid');
            $insdata['title'] = $param['title'];
            $insdata['content'] = $param['content-editormd-markdown-doc']; //内容
            $insdata['pic'] = $param['pic']; //封面图
            $res = Db::name('article')->insert($insdata);

            if($res){
                $this->success("保存成功！！",'',$insdata);
            }else{
                $this->error("(⊙o⊙)…保存失败");
            }
        }else{  //发表
            $tags_ids = $this->noIssetInsert($param['tag'],'tag');
            $category_id = $this->noIssetInsert($param['cate'],'category');

            $publish = false;
            // 启动事务
            Db::startTrans();
            try {
                $insdata['author_id'] = session('userid');
                $insdata['title'] = $param['title'];
                $insdata['content'] = $param['content-editormd-markdown-doc']; //内容
                $insdata['pic'] = $param['pic']; //封面图
                $insdata['category_id'] = $category_id;
                $article_id = Db::name('article')->insertGetId($insdata);
                foreach ($tags_ids as $k => $v){
                    $dataIns['article_id'] = $article_id;
                    $dataIns['tag_id'] = $v;
                    Db::name('article_tags')->insert($dataIns);
                }

                // 提交事务
                Db::commit();
                $publish = true;
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
                $errMsg = $e->getMessage();
            }

            if($publish){
                $this->success("发布成功！",'/admin/content/list');
            }else{
                $this->error("(⊙o⊙)…发布失败，".$errMsg);
            }
        }

    }
    //编辑文章
    public function update($param)
    {
        if($param['save_draft'] == 'draft'){ //保存草稿
            $insdata['author_id'] = session('userid');
            $insdata['title'] = $param['title'];
            $insdata['content'] = $param['content-editormd-markdown-doc']; //内容
            $insdata['pic'] = $param['pic']; //封面图
            $res = Db::name('article')->where('id', $param['artid'])->update($insdata);

            if($res){
                $this->success("保存成功！",'',$insdata);
            }else{
                $this->error("(⊙o⊙)…保存失败");
            }
        }else{  //发表
            $tags_ids = $this->noIssetInsert($param['tag'],'tag');
            $category_id = $this->noIssetInsert($param['cate'],'category');

            $publish = false;
            // 启动事务
            Db::startTrans();
            try {
                $insdata['author_id'] = session('userid');
                $insdata['title'] = $param['title'];
                $insdata['content'] = $param['content-editormd-markdown-doc']; //内容
                $insdata['pic'] = $param['pic']; //封面图
                $insdata['category_id'] = $category_id;
                $res = Db::name('article')->where('id', $param['artid'])->update($insdata);
                if($res){
                    foreach ($tags_ids as $k => $v){
                        $dataIns['article_id'] = $param['artid'];
                        $dataIns['tag_id'] = $v;
                        Db::name('article_tags')->where('article_id', $param['artid'])->update($dataIns);
                    }
                }

                // 提交事务
                Db::commit();
                $publish = true;
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
                $errMsg = $e->getMessage();
            }

            if($publish){
                $this->success("发布成功！",'/admin/content/list');
            }else{
                $this->error("(⊙o⊙)…发布失败，".$errMsg);
            }
        }

    }
    //标签、分类 不存在则为新数据插入
    public function noIssetInsert($data,$table_name){
        $data = explode(',',$data);
        foreach ($data as $k => $v){
            $where['name'] = $v;
            $res = Db::name($table_name)->where($where)->field('id')->find();
            if(!$res){
                $dataIns['name'] = substr(strstr($v,'-'),1);
                $dataIns['author_id'] = session('userid');
                $index = Db::name($table_name)->insertGetId($dataIns);
                $insIndex[] = $index;
            }else{
                $insIndex[] = $res['id'];
            }
        }

        if($table_name=='tag'){
            return $insIndex;
        }else{
            return $res?$res['id']:$index;
        }

    }

    //发布页面，获取标签、分类、系列 数据
    public function getdata(){
        $whereCate = $dataCate = [];
        $dataCate = Db::name('category')->where($whereCate)->field('name,name as value')->select();

        $whereTag = $dataTag = [];
        $dataTag = Db::name('tag')->where($whereTag)->field('name,name as value')->select();

        $whereSeries = $dataSeries = [];
        $dataSeries = Db::name('series')->where($whereSeries)->field('id,name as value')->select();

        return json(['tag'=>$dataTag,'cate'=>$dataCate,'series'=>$dataSeries]);
    }

    public function md_upload() {
        $file = request()->file('editormd-image-file');
        $name = session('userid').'_'.date('YmdHis').rand(100,999).'.'.$file->extension();
        $path = date('Y');
        try {
            // 使用验证器验证上传的文件
            validate(['file' => [
                // 限制文件大小(单位b)，这里限制为1M
                'fileSize' => 4 * 1024 * 1024,
                // 限制文件后缀，多个后缀以英文逗号分割
                'fileExt'  => 'jpg,jpeg,gif,png,bmp,webp'
            ]])->check(['file' => $file]);
            $savename = \think\facade\Filesystem::disk('markdown')->putFileAs( $path, $file,$name);
            // 拼接URL路径
            $url = \think\facade\Filesystem::getDiskConfig('markdown', 'url') . '/' . str_replace('\\', '/', $savename);

        } catch (\think\exception\ValidateException $e) {
            return json([
                'success' => 0,
                'message'  => $e->getMessage(),
                'url'  => '',
            ]);
        }

        return json([
            'success' => 1,
            'message'  => '上传成功',
            'url'  => $url,
        ]);

    }

    //上传封面图
    public function upload() {
        $file = request()->file('file');
        $name = session('userid').'_'.date('YmdHis').rand(100,999).'.'.$file->extension();
        $path = date('Y');
        try {
            // 使用验证器验证上传的文件
            validate(['file' => [
                // 限制文件大小(单位b)，这里限制为1M
                'fileSize' => 1 * 1024 * 1024,
                // 限制文件后缀，多个后缀以英文逗号分割
                'fileExt'  => 'gif,jpg,jpeg,png'
            ]])->check(['file' => $file]);
            $savename = \think\facade\Filesystem::disk('cover')->putFileAs( $path, $file,$name);
            // 拼接URL路径
            $url = \think\facade\Filesystem::getDiskConfig('cover', 'url') . '/' . str_replace('\\', '/', $savename);

        } catch (\think\exception\ValidateException $e) {
            return json([
                'code' => 0,
                'msg'  => $e->getMessage(),
            ]);
        }
        $info = [
            // 文件路径
            'path' => $savename,
            // URL路径
            'url'  => $url,
            // 文件大小（字节）
            'size' => $file->getSize(),
            // 文件名
            'name' => $file->getFilename(),
            // 文件MINE
            'mime' => $file->getMime(),
        ];

        return json([
            'code' => 1,
            'msg'  => 'success',
            'data'  => $info,
        ]);

    }


    //标签管理
    public function tags(){
        if(request()->isAjax()){
            $param = request()->param();

            $map = array();
            if(isset($param['key']) && $param['key']){
                if($param['key']['name']){
                    $map[] = ['name','like','%'.trim($param['key']['name']).'%'];
                }
            }

            $data_list = Db::name('tag')
                ->where($map)
                ->where('author_id',session('userid'))
                ->paginate(10)->toArray();

            $data['code'] = '0';
            $data['count'] = $data_list['total'];
            $data['data'] = $data_list['data'];
            return json($data);
        }
        View::assign('current_url',request()->url());
        return View::fetch();
    }

    //类别管理
    public function category(){
        if(request()->isAjax()){
            $param = request()->param();

            $map = array();
            if(isset($param['key']) && $param['key']){
                if($param['key']['name']){
                    $map[] = ['name','like','%'.trim($param['key']['name']).'%'];
                }
            }

            $data_list = Db::name('category')
                ->where($map)
                ->where('author_id',session('userid'))
                ->paginate(10)->toArray();

            $data['code'] = '0';
            $data['count'] = $data_list['total'];
            $data['data'] = $data_list['data'];
            return json($data);
        }
        View::assign('current_url',request()->url());
        return View::fetch();
    }

    public function cate_classify(){
        if(request()->isAjax()){
            $map['pid'] = 0;
            $data_list = Db::name('category')
                ->where($map)
                ->where('author_id',session('userid'))
                ->select();
            $dataAll = array();
            foreach ($data_list as $k =>$v){
                $children = Db::name('category')
                    ->where('pid',$v['id'])
                    ->where('author_id',session('userid'))
                    ->select();

                $dataChiAll = array();
                if($children){
                    foreach ($children as $kk =>$vv){
                        $dataChi = array();
                        $dataChi['title'] = $vv['name'];
                        $dataChi['id'] = $vv['id'];
                        $dataChi['level'] = 2;
                        $dataChiAll[] = $dataChi;
                    }
                }
                $dataJson = array();
                $dataJson['title'] = $v['name'];
                $dataJson['id'] = $v['id'];
                $dataJson['level'] = 1;
                if($dataChiAll){
                    $dataJson['children'] = $dataChiAll;
                }

                $dataAll[] = $dataJson;
            }
            $data['code'] = 1;
            $data['data'] = $dataAll;
            return json($data);
        }
    }

    public function deal_cate(){
        if (request()->isAjax()) {
            $param = request()->param();
            $parent = $param['parent'];
            $deal = $param['deal'];
            $type = $param['type'];
            if($type == 'update'){
                //$parent:父级name   $deal:自身name
                $id = Db::name('category')->where('name',$deal)->where('author_id',session('userid'))->value('id');
                if($id){
                    $parentId = Db::name('category')->where('name',$parent)->where('author_id',session('userid'))->value('id');
                    Db::name('category')
                        ->where('id',$id)
                        ->where('author_id',session('userid'))
                        ->update(['pid' => $parentId]);

                    $data['code'] = 1;
                    $data['msg'] = 'success';
                    return json($data);
                }

            }elseif ($type == 'del'){
                //$parent:父级name   $deal:自身id
                //根据父级的name 查找相应的 id
                $parentId = Db::name('category')->where('name',$parent)->where('author_id',session('userid'))->value('id');
                $delPid = Db::name('category')->where('id',$deal)->where('author_id',session('userid'))->value('pid');
                //如果移除的子级的父级id跟查找的id匹配，则允许移除父子关系
                if($parentId && $parentId == $delPid){
                    Db::name('category')
                        ->where('id',$deal)
                        ->where('author_id',session('userid'))
                        ->update(['pid' => '0']);
                    $data['code'] = 1;
                    $data['msg'] = 'success';
                    return json($data);
                }
            }
        }
        $data['code'] = 0;
        $data['msg'] = 'error';
        return json($data);

    }

    //系列文章
    public function series(){
        if(request()->isAjax()){
            $param = request()->param();

            $map = array();
            if(isset($param['key']) && $param['key']){
                if($param['key']['name']){
                    $map[] = ['name','like','%'.trim($param['key']['name']).'%'];
                }
            }

            $data_list = Db::name('series')
                ->where($map)
                ->where('author_id',session('userid'))
                ->paginate(10)->toArray();

            $data['code'] = '0';
            $data['count'] = $data_list['total'];
            $data['data'] = $data_list['data'];
            return json($data);
        }
        View::assign('current_url',request()->url());
        return View::fetch();
    }

    public function series_info(){
        if(request()->isAjax()){
            $param = request()->param();

            $map = array();
            if(isset($param['id']) && $param['id']){
                $map['series_id'] = trim($param['id']);
            }

            //所有数据
            $data1 = Db::name('article')
                ->where('author_id',session('userid'))
                ->field('id as value,title')
                ->select();

            //已归类数据
            $data2 = Db::name('article')
                ->where($map)
                ->where('author_id',session('userid'))
                ->column('id');

            $data['code'] = '1';
            $data['data1'] = $data1;
            $data['data2'] = $data2;
            return json($data);
        }
        return '';
    }

    public function series_save(){
        if(request()->isAjax()){
            $param = request()->param();

            $seriesid = $param['seriesid'];
            $type = $param['type'];
            $ids = $param['ids'];
            $upData['series_id'] = $type == 0 ? $seriesid : '';

            Db::name('article')->where([
                ['author_id', '=', session('userid')],
                ['id', 'in', explode(',',$ids)],
            ])->update($upData);

            return 'success';
        }
        return 'error';
    }




}
