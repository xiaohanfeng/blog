<?php /*a:3:{s:53:"E:\WWW\phpPro\phpblog\app\index\view\index\index.html";i:1638335852;s:52:"E:\WWW\phpPro\phpblog\app\index\view\index\base.html";i:1644300343;s:52:"E:\WWW\phpPro\phpblog\app\index\view\index\side.html";i:1637041998;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="renderer" content="webkit">
    <title>微客鸟窝-博客</title>
    <meta name="keywords" content="wekenw博客系统,微客鸟窝部落"/>
    <meta name="description" content="本站点是wekenw博客系统，提供给各界人士使用，笔记管理，文章发表..."/>
    <meta name="author" content="wekenw">
    <link rel="stylesheet" href="/static/css/animate.css" type="text/css" media="all"/>
    <link rel="icon" href="/static/../favicon.ico" type="image/x-icon">
    <script src="/static/index/js/jquery-2.2.4.min.js"></script>
    <script src="/static/index/js/zblogphp.js"></script>
    <script src="/static/index/js/c_html_js_add.js"></script>
    <script src="/static/index/js/swiper.min.js"></script>
    <link rel="stylesheet" href="/static/index/css/swiper.min.css" type="text/css" media="all"/>
    <link href="/static/index/css/style.css" type="text/css" media="all" rel="stylesheet"/>
    <!--[if lt IE 9]>
      <script src="/static/index/js/html5shiv.js"></script>
    <![endif]-->
    <script>
        //百度统计
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?37650e467733fc7bcab0aeeeb8ae1dc4";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    

    <style>
        b.logofont {
            font: 697 30px "Comic Sans MS";
            color: white;
            text-shadow: 0 0 15px #000000, 10px 16px 53px #ebac4d, -19px -9px 11px #ec760c, -17px -5px 0px #93e538, 3px 10px 0px #43410b;
        }
    </style>
</head>

<body class="home home-index" style="background-image:url(/static/index/images/img/body_bg.jpg);">
<div id="pjax_on">
    <!--头部开始-->
    <header class="top-header">
        <div class="top-bar">
            <div class="new-header container clearfix">
                <div class="top-bar-left header-nav fl" data-type="index" data-infoid="index">
                    <aside class="mobile_aside mobile_nav">
                        <ul id="nav" class="top-bar-menu nav-pills">
                            <li id="" class="">
                                <a href="/">
                                    <i class="fa fa-home"></i>首页</a>
                            </li>
                            <?php $_result=get_categories(1,0);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $k = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($k % 2 );++$k;?>
                            <li id="navbar-category-<?php echo htmlentities($k); ?>" class="">
                                <a href="<?php echo url('index/cate/'); ?><?php echo htmlentities($cate['id']); ?>">
                                <?php if($cate['verboseName']): ?><?php echo htmlentities($cate['verboseName']); else: ?><?php echo htmlentities($cate['name']); ?><?php endif; ?>
                                </a>
                                <?php $childcate = get_categories(1,$cate['id']); if($childcate): ?>
                                    <ul class="dropdown-menu sub-menu">
                                    <?php if(is_array($childcate) || $childcate instanceof \think\Collection || $childcate instanceof \think\Paginator): $i = 0; $__LIST__ = $childcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ch): $mod = ($i % 2 );++$i;?>
                                    <li id="navbar-page-<?php echo htmlentities($i); ?>"><a href="<?php echo url('index/cate/'); ?><?php echo htmlentities($ch['id']); ?>"><?php if($ch['verboseName']): ?><?php echo htmlentities($ch['verboseName']); else: ?><?php echo htmlentities($ch['name']); ?><?php endif; ?></a></li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>

<!--                            <li id="navbar-category-11" class=""><a href="/resume/" target="_blank">我的简历</a></li>-->
<!--                            <li id="navbar-category-12" class=""><a href="/zhuanlan/">用户专栏</a>-->
<!--                                <ul class="dropdown-menu sub-menu">-->
<!--                                    <li id="navbar-page-12"><a href="/zhuanlan/about/">关于我们</a></li>-->
<!--                                    <li id="navbar-page-12"><a href="/zhuanlan/contact/">联系我们</a></li>-->
<!--                                    <li id="navbar-page-12"><a href="/zhuanlan/cooperation/">内容合作</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
                        </ul>
                        </li>
                        </ul>
                    </aside>
                </div>
                <div class="top-bar-right text-right fr">
                    <div class="top-admin">
                        <?php if(session('userid')): ?>
                            <div class="login">
                                »&nbsp;<span style="color:red;"><b><?php echo session('username'); ?></b></span>&nbsp;&nbsp;
                                <a href="<?php echo url('/admin/'); ?>" target="_blank">我的空间</a>&nbsp;&nbsp;
<!--                                <a href="/" target="_blank">短信息</a>-->
                                <a href="<?php echo url('logout/'); ?>" onclick="return confirm('确认要退出?');">退出</a>
                            </div>
                        <?php else: ?>
                            <div class="login">
                                <form name="login" method="post" action="<?php echo url('login/'); ?>">
                                    <input type="hidden" name="__token__" value="<?php echo token(); ?>"/>
                                    用户名：<input name="username" type="text" class="inputText" size="16">&nbsp;
                                    密码：<input name="password" type="password" class="inputText" size="16">&nbsp;
                                    <input type="submit" name="dosubmit" value="登陆" class="inputSub">&nbsp;
<!--                                     <a href="<?php echo url('register/'); ?>" target="_blank">>>注册</a>-->
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="container secnav clearfix">
                <div class="fav-subnav">
                    <div class="top-bar-left pull-left navlogo">
                        <a href="/" class="logo box">
                            <b class="shan logofont">微客鸟窝</b>
                        </a>
                        <span style="font-family: 华文新魏;margin-left: 30px;">
                            <span style="color: rgba(255, 0, 0, 1)" color="#ff0000">w</span>
                            <span style="color: rgba(255, 137, 0, 1)" color="#ff8900">e</span>
                            <span style="color: rgba(146, 192, 0, 1)" color="#92c000">k</span>
                            <span style="color: rgba(0, 192, 36, 1)" color="#00c024">e</span>
                            <span style="color: rgba(255, 137, 0, 1)" color="#ff8900">n</span>
                            <span style="color: rgba(0, 192, 218, 1)" color="#00c0da">w</span>
                        </span>
<!--                            <img class="sublogo" alt="wekenw" src="/static/index/images/sublogo.png">-->
                    </div>
<!--                    <div class="search-warp clearfix">-->
<!--                        <form name="searchform" method="GET" action="/search/" id="searchform">-->
<!--                            <div class="search-area">-->
<!--                                <input class="search-input" placeholder="<?php echo htmlentities((isset($keyword) && ($keyword !== '')?$keyword:'搜索感兴趣的知识和文章')); ?>" type="text" name="keyword"-->
<!--                                       id="keyboard"></div>-->
<!--                            <button class="showhide-search" type="submit">-->
<!--                                <i class="icon font-search"></i>搜索一下-->
<!--                            </button>-->
<!--                        </form>-->
<!--                    </div>-->
                </div>
            </div>
            <div id="percentageCounter"></div>
        </div>
    </header>
    <!--头部结束-->
    <div class="main-content container clearfix" style="margin-top: 175px;">
        
<link href="/static/index/css/page.css" rel="stylesheet"> <!--分页样式-->
<div class="row">
    <div class="main fl">

        <!--首页轮播 start-->
        <!--                <div class="wrapper-ban">-->
        <!--                    <div class="swiper-container swiper-main">-->
        <!--                        <div class="swiper-wrapper">-->
        <!--                            <?php $list = $cc = array(1,2,3); ?>-->
        <!--                            <?php foreach($list as $key=>$vo): ?>-->
        <!--                                <div class="swiper-slide">-->
        <!--                                    <a href="https://www.nx10.cn/" target="_blank">-->
        <!--                                        <img src="/static/index/images/banner1.jpg" alt="首页轮播文字">-->
        <!--                                        <span class="swiper-title">首页轮播文字{i}</span></a>-->
        <!--                                </div>-->
        <!--                            <?php endforeach; ?>-->
        <!--                        </div>-->
        <!--                        &lt;!&ndash; Add Pagination &ndash;&gt;-->
        <!--                        <div class="swiper-pagination"></div>-->
        <!--                        <div class="swiper-button-next"></div>-->
        <!--                        <div class="swiper-button-prev"></div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--首页轮播 end-->

        <!--                <div class="top_list">-->
        <!--                    <?php if(is_array($hot_list) || $hot_list instanceof \think\Collection || $hot_list instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($hot_list) ? array_slice($hot_list,0,4, true) : $hot_list->slice(0,4, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>-->
        <!--                        <div class="col-small">-->
        <!--                            <div class="col-pic">-->
        <!--                                <a href="" title="<?php echo htmlentities($art['title']); ?>">-->
        <!--                                    <img src="/static/index/d/file/p/2020/02-13/9046549fd43b04a946ce1fff5974adcd.jpg"-->
        <!--                                         width="100" height="75" alt="<?php echo htmlentities($art['title']); ?>"></a>-->
        <!--                            </div>-->
        <!--                            <div class="col-info">-->
        <!--                                <h3>-->
        <!--                                    <a href="<?php echo url('detail/'); ?><?php echo htmlentities($art['id']); ?>" title="<?php echo htmlentities($art['title']); ?>" class="col-title"><?php echo htmlentities($art['title']); ?></a></h3>-->
        <!--                                <p class="col-desc"><?php echo htmlentities($art['excerpt']); ?></p>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    <?php endforeach; endif; else: echo "" ;endif; ?>-->

        <!--                    <ul class="col-large">-->
        <!--                        <?php if(is_array($hot_list) || $hot_list instanceof \think\Collection || $hot_list instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($hot_list) ? array_slice($hot_list,4,6, true) : $hot_list->slice(4,6, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>-->
        <!--                            <li>-->
        <!--                                <em class="color-<?php echo htmlentities($i); ?>"><?php echo htmlentities($i); ?></em>-->
        <!--                                <span class="list-date">2020-02-08</span>-->
        <!--                                <a href="<?php echo url('detail/'); ?><?php echo htmlentities($art['id']); ?>" title="<?php echo htmlentities($art['title']); ?>"><?php echo htmlentities($art['title']); ?></a>-->
        <!--                            </li>-->
        <!--                        <?php endforeach; endif; else: echo "" ;endif; ?>-->
        <!--                    </ul>-->
        <!--                </div>-->

        <div class="side-hot auto-side">
            <div class="home-main auto-main">
                <!--页面主体信息-->
                <?php if(is_array($article_list) || $article_list instanceof \think\Collection || $article_list instanceof \think\Paginator): $i = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
                <article class="post-list blockimg picsrcd auto-list wow fadeInDown" id="list{i}">
                    <div class="entry-container">
                        <div class="block-image feaimg">
                            <a class="block-fea" href="<?php echo url('detail/'); ?><?php echo htmlentities($art['id']); ?>" title="<?php echo htmlentities($art['title']); ?>">
                                <img class="lazy" src="<?php echo htmlentities($art['pic']); ?>" alt="<?php echo htmlentities($art['title']); ?>" title="<?php echo htmlentities($art['title']); ?>">
                            </a>
                            <div class="item-slant reverse-slant bg-orange"></div>
                            <div class="item-slant"></div>
                        </div>
                        <header class="entry-header">
                            <h2 class="entry-title">
                                <a href="<?php echo url('detail/'); ?><?php echo htmlentities($art['id']); ?>">
                                    <?php if($art['pv'] > 100): ?>
                                    <span class="badge arc_v4">热文</span>
                                    <?php endif; ?>
                                    <?php echo htmlentities($art['title']); ?>
                                </a>
                            </h2>
                        </header>
                        <div class="entry-summary ss">
                            <p>
                                <?php echo htmlentities($art['excerpt']); ?></p>
                        </div>
                        <div class="entry-meta fea-meta">
                            <a>原创 <span class="separator">/</span></a>
                            <a class="meta-cate" href="javascript:;"><?php echo htmlentities($art['name']); ?> <span class="separator">/</span></a>
                            <time datetime="2020-09-12"><?php echo htmlentities(date('Y-m-d',!is_numeric($art['created_time'])? strtotime($art['created_time']) : $art['created_time'])); ?> <span
                                    class="separator">/</span></time>
                            <a class="meta-viewnums" href="javascript:;">0 评论
                                <span class="separator">/</span></a>
                            <span class="meta-viewnums"><?php echo htmlentities($art['pv']); ?> 阅读</span></div>
                    </div>
                </article>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <!--分页-->
                <?php echo $page; ?>
            </div>
        </div>
    </div>
    <!--博主介绍-->
    <div class="side fr">
    <!--博主介绍-->
    <section class="widget_avatar">
        <div class="widget_user"
             style="background-image: url(/static/index/images/img/aside-author-bg.jpg);">
            <img src="/static/index/images/vip.jpg" alt="头像" height="70" width="70">
            <div class="name">
                <h3>
                    <a href="tencent://message/?uin=2669941226&Site=qq&Menu=yes" rel="nofollow" target="_blank" title="QQ联系我">wucs的博客</a>
                </h3>
                <p>Web后端工程师,获得美国《时代周刊》2006年度风云人物、2008年感动中国组委会特别大奖！</p>
            </div>
        </div>
        <div class="webinfo">
            <div class="item">
                <span class="num">暂无统计</span>
                <span>文章</span></div>
            <div class="item">
                <span class="num">暂无统计</span>
                <span>评论</span></div>
            <div class="item">
                <span class="num">暂无统计</span>
                <span>浏览</span></div>
        </div>
    </section>
    <!--博主介绍-->
<!--    <section class="widget wow fadeInDown" id="divPrevious">-->
<!--        <h3 class="widget-title">最近发表</h3>-->
<!--        <ul class="widget-box divPrevious">-->
<!--            <?php $_result=get_recent_articles(5);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>-->
<!--             <li><a href="<?php echo url('/index/detail/'); ?><?php echo htmlentities($art['id']); ?>"><?php echo htmlentities($art['title']); ?></a></li>-->
<!--            <?php endforeach; endif; else: echo "" ;endif; ?>-->
<!--        </ul>-->
<!--    </section>-->

    <?php if(!(empty($article) || (($article instanceof \think\Collection || $article instanceof \think\Paginator ) && $article->isEmpty()))): ?>
    <section class="widget wow fadeInDown" id="toc">
        <h3 class="widget-title">文章目录</h3>
        <ul class="widget-box divPrevious" id="custom-toc-container">

        </ul>
    </section>
    <?php endif; ?>

    <section class="widget wow fadeInDown" id="divTags">
        <h3 class="widget-title">标签列表</h3>
        <ul class="widget-box divTags">
            <?php $_result=get_tags();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?>
                <li>
                    <a href="javascript:;" target="_blank" title="<?php echo htmlentities($tag['name']); ?>"><?php echo htmlentities($tag['name']); ?>
                        <span class="tag-count">(<?php echo htmlentities($tag['name']); ?>)</span>
                    </a>
                </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </section>
    <section class="widget wow fadeInDown" id="divLinkage">
        <h3 class="widget-title">友情链接</h3>
        <ul class="widget-box divLinkage">
            <?php $_result=get_links(10);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo htmlentities($link['href']); ?>" target="_blank" title="{{ link.title }}"><?php echo htmlentities($link['title']); ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </section>
</div>
<style>
    .divLinkage>li>a{
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        display: block;
    }
</style>


</div>

<!--        <div id="primary" class="side-primary wow fadeInDown" data-wow-delay="0.25s">-->
<!--            <div class="side-title-wrap">-->
<!--                <h3 class="widget-title">互联资讯</h3>-->
<!--                <span>自定义此处文字内容</span></div>-->
<!--            <div class="side-box">-->
<!--                <ul class="side-main">-->
<!--                    <?php $list = $cc = array(1,2,3,4,5,6); ?>-->
<!--                    <?php foreach($list as $key=>$vo): ?>-->
<!--                    <li class="side-list side-list-box">-->
<!--                        <a href="/zixun/153.html" title="国外机构测得iPhone 11 Pro辐射量超标137%" class="block">-->
<!--                            <img src="/static/index/images/grey.gif" alt="国外机构测得iPhone 11 Pro辐射量超标137%" width="130"-->
<!--                                 height="98"-->
<!--                                 style="background: url(/static/index/d/file/p/2020/02-13/1bed23fb41166bdec133a4ea723068b9.jpg) center center / cover no-repeat;"></a>-->
<!--                        <div class=" side-h3-title">-->
<!--                            <h3>-->
<!--                                <a href="/zixun/153.html" title="国外机构测得iPhone 11 Pro辐射量超标137%">国外机构测得iPhone 11-->
<!--                                    Pro辐射量超标137%</a></h3>-->
<!--                            <small>2020-02-08</small>-->
<!--                        </div>-->
<!--                        <p>-->
<!--                            <a href="/zixun/153.html" title="国外机构测得iPhone 11 Pro辐射量超标137%">　　国外机构测得iPhone 11-->
<!--                                Pro辐射量超标137%　　无论是三方出货数据还是苹果财报(截至去年12月28日)，都证明iPhone 11系列的市场热情不低，仍颇受消费者欢迎。　　...</a></p>-->
<!--                    </li>-->
<!--                    <?php endforeach; ?>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->

<div class="line-big">
    <?php foreach($series as $sek=>$sev): ?>
    <div class="line-box wow fadeInDown">
        <h3 class="cat-title bkx">
            <span class="badge arc_v6">系列文章</span>
            <a href="<?php echo url('index/series/'); ?><?php echo htmlentities($sev['id']); ?>"><?php echo htmlentities($sev['name']); ?>
                <span class="more-i">
                          <span></span>
                          <span></span>
                          <span></span>
                        </span>
            </a>
        </h3>
        <?php $list = $temp = get_series_articles($sev['id']); ?>
        <div class="cat-site">
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($list) ? array_slice($list,0,1, true) : $list->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <figure class="small-thumbnail">
                <a class="sc" href="<?php echo url('detail/'); ?><?php echo htmlentities($list[0]['id']); ?>">
                    <img src="<?php echo htmlentities($list[0]['pic']); ?>" alt="<?php echo htmlentities($list[0]['title']); ?>">
                </a>
            </figure>
            <h2 class="entry-small-title"><a href="<?php echo url('detail/'); ?><?php echo htmlentities($list[0]['id']); ?>"
                                             rel="bookmark"><?php echo htmlentities($list[0]['title']); ?></a></h2>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <ul class="cat-list">
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($list) ? array_slice($list,1,4, true) : $list->slice(1,4, true); if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li>
<!--                    <span class="list-date"><?php echo htmlentities(date('Y-m-d',!is_numeric($vo['created_time'])? strtotime($vo['created_time']) : $vo['created_time'])); ?></span>-->
                    <a href="<?php echo url('detail/'); ?><?php echo htmlentities($vo['id']); ?>" rel="bookmark"><?php echo htmlentities($vo['title']); ?></a>
                </li>
                <?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
            </ul>
        </div>
    </div>

    <?php endforeach; ?>
</div>

<div class="link-box box-shadow wow fadeInDown">
    <!--友情链接-->
    <section class="links-title">
        <h3>友情链接</h3>
        <span class="suburl">
                      <a href="javascript:;" target="_blank">更多
                        <i class="icon font-add-circle"></i>
                      </a>
                    </span>
    </section>
    <ul id="links-home">
        <?php $_result=get_links(20);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?>
        <li><a href="<?php echo htmlentities($link['href']); ?>" target="_blank" title="<?php echo htmlentities($link['title']); ?>"><?php echo htmlentities($link['title']); ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>

    </div>
</div>
<!--底部开始-->

<footer class="footer bg-dark">
    <div class="container">
        <div class="footer-fill">
            <div class="footer-column">
<!--                <div class="footer-menu">-->
<!--                    <a href="https://top.wekenw.com/" target="_blank" style="color:#3297fc;">wekenw简信息</a>-->
<!--                </div>-->
                <div class="footer-copyright text-xs">
                    <p>Copyright &copy;
                        <a href="https://www.wekenw.com/" title="wekenw" target="_blank">www.wekenw.com</a>
                        | 备案号:<a rel="nofollow" href="http://beian.miit.gov.cn" target="_blank">
                            <img src="/static/index/images/icp.png" alt="京ICP备2021012843号-1">
                            <span style="color:#3297fc;">京ICP备2021012843号-1</span>
                        </a> | <a rel="nofollow" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010502048791" target="_blank">
                            <img src="/static/index/images/beian.png" alt="京公网安备 11010502048791号">
                            <span style="color:#3297fc;">京公网安备 11010502048791号</span>
                        </a> |
                        <a href="#" target="_blank"><span style="color:#3297fc;">网站地图</span></a>
                        安全运行<span id="iday"></span>天
                    </p>
                </div>
            </div>
            <div class="flex-md-fill"></div>
            <div class="footer-f-pic">
                <a href="tencent://message/?uin=2669941226&Site=qq&Menu=yes" rel="nofollow" target="_blank" title="QQ">
                    <span><i class="icon font-qq"></i></span>
                </a>
                <a href="javascript:" class="btn-icon fr-2">
                    <span><i class="icon font-weixin"></i></span>
                    <span class="bg-qrcode" style="background-image:url(/static/index/images/wx.jpg);"></span>
                </a>
            </div>
        </div>
    </div>
    <div id="backtop" class="backtop">
        <div class="bt-box top">
            <i class="icon font-top"></i>
        </div>
        <div class="bt-box bt_night">
            <a class="at-night" href="javascript:switchNightMode()" target="_self">
                <i class="icon font-taiyang"></i>
            </a>
        </div>
        <div class="bt-box bottom">
            <i class="icon font-bottom"></i>
        </div>
    </div>
</footer>

<!--底部结束-->
<div class="none">
    <script src="/static/index/js/custom.js"></script>
    <script src="/static/index/js/wow.min.js"></script>
</div>
</body>
</html>
<script>function siteRun(d) {
    var nowD = new Date();
    return parseInt((nowD.getTime() - Date.parse(d)) / 24 / 60 / 60 / 1000)
}
document.getElementById("iday").innerHTML = siteRun("2021/04/22");
</script>