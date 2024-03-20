<?php
namespace app\index\controller;
use app\BaseController;
use think\App;
use think\facade\Session;
use think\facade\View;
use think\facade\Db;
use Elasticsearch\ClientBuilder;

class Resume extends BaseController
{
    public function index()
    {

        $article_list = Db::table('blog_article')
            ->alias('art')
            ->join('blog_category cate ','art.category_id= cate.id')
            ->where('art.status',2) //上架
            ->field('art.id,art.title,art.pic,art.created_time,art.pv,art.excerpt,cate.name')
            ->order('created_time desc')
            ->paginate(4);

        View::assign([
            'hot_list'  => get_hot_articles(10),
            'recent_list' => get_recent_articles(),
            'categories' => get_categories(),
            'series' => get_series()
        ]);

        return View::fetch();
    }

}
