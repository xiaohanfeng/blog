<?php
namespace app\index\controller;
use app\BaseController;
use think\App;
use think\facade\Session;
use think\facade\View;
use think\facade\Db;
use Elasticsearch\ClientBuilder;

class Index extends BaseController
{
    public function __construct(App $app){
        parent::__construct($app);
        if(cookie('userid') && cookie('username')){
            //将用户信息记录到session数据
            Session::set('userid', cookie('userid'));
            Session::set('username', cookie('username'));
        }
    }
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

        // 获取总记录数
        $count = $article_list->total();
        // 获取分页显示
        $page = $article_list->render();
        return view('index', ['article_list' => $article_list,'page' => $page, 'count' => $count]);
    }

    public function detail($id)
    {
        //$article = Db::table('blog_article')->where('id',$id)->find();
        $article = Db::table('blog_article')
            ->alias('art')
            ->join('blog_category cate ','art.category_id= cate.id', 'LEFT')
            ->field('art.*,cate.name as category_name')
            ->where('art.id',$id)->find();

        $tags = Db::table('blog_tag')
            ->alias('t1')
            ->join('blog_article_tags t2','t1.id= t2.tag_id', 'LEFT')
            ->field('t1.name')
            ->where('t2.article_id',$id)->select();

        $prev = Db::table('blog_article')->where('id','<',$id)->limit(0,1)->find();
        $next = Db::table('blog_article')->where('id','>',$id)->limit(0,1)->find();

        View::assign('article',$article);
        View::assign('tags',$tags);
        View::assign('prev',$prev);
        View::assign('next',$next);

        return View::fetch();
    }

    public function category($id)
    {
        $cate_list = Db::table('blog_category')->where('pid',$id)->column('id');

        if($cate_list){
            $article_list = Db::table('blog_article')
                ->alias('art')
                ->join('blog_category cate ','art.category_id= cate.id', 'LEFT')
                ->where('art.status',2) //上架
                ->where('category_id','in',$cate_list)
                ->paginate(8);
        }else{
            $article_list = Db::table('blog_article')
                ->alias('art')
                ->join('blog_category cate ','art.category_id= cate.id', 'LEFT')
                ->field('art.id,art.title,art.pic,art.created_time,art.pv,art.excerpt,cate.name')
                ->where('art.status',2) //上架
                ->where('category_id',$id)
                ->paginate(8);
        }

        // 获取总记录数
        $count = $article_list->total();
        // 获取分页显示
        $page = $article_list->render();
        return view('list', ['article_list' => $article_list,'page' => $page, 'count' => $count]);
    }

    public function series($id)
    {
        $article_list = Db::table('blog_article')
            ->alias('art')
            ->join('blog_category cate ','art.category_id= cate.id', 'LEFT')
            ->where('art.status',2) //上架
            ->where('series_id','in',$id)
            ->order('art.id desc')
            ->paginate(8);

        // 获取总记录数
        $count = $article_list->total();
        // 获取分页显示
        $page = $article_list->render();
        return view('list', ['article_list' => $article_list,'page' => $page, 'count' => $count]);
    }

    public function search(){
//        $client = ClientBuilder::create()->setHosts([
//            [
//                'host' => '',
//                'port' => '',
//                'scheme' => '',
//                'user' => '',
//                'pass' => ''
//            ]
//        ])->setConnectionPool('\Elasticsearch\ConnectionPool\SimpleConnectionPool', [])
//            ->setRetries(10)->build();

        $hosts = [
            '192.168.1.1:9200',         // IP + Port
            '192.168.1.2',              // Just IP
            'mydomain.server.com:9201', // Domain + Port
            'mydomain2.server.com',     // Just Domain
            'https://localhost',        // SSL to localhost
            'https://192.168.1.3:9200'  // SSL to IP + Port
        ];
        $client = ClientBuilder::create()           // Instantiate a new ClientBuilder
        ->setHosts($hosts)      // Set the hosts
        ->build();

        var_dump($client);

        $params = [
            'index' => 'my_index'
        ];

        // Create the index
//        $response = $client->indices()->create($params);
//        var_dump($response);

    }


}
