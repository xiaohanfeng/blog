<?php /*a:3:{s:54:"E:\WWW\phpPro\phpblog\app\index\view\index\detail.html";i:1642748524;s:52:"E:\WWW\phpPro\phpblog\app\index\view\index\base.html";i:1642476490;s:52:"E:\WWW\phpPro\phpblog\app\index\view\index\side.html";i:1637041998;}*/ ?>
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
    
  <link href="__static__/css/meihua.css" rel="stylesheet">
  <script type="text/javascript" src="/e/data/js/ajax.js"></script>

<!--    md-->
<link href="/markdown/css/editormd.min.css" rel="external nofollow" rel="external nofollow" rel="stylesheet" />
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<!--<link rel="stylesheet" href="css/style.css" />-->
<link rel="stylesheet" href="/markdown/css/editormd.preview.css" />


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
        
<nav class="navcates place">当前位置：
    <i class="icon font-home"></i>
    <a href="/">首页</a>&nbsp;>&nbsp;<a href="javascript:;"><?php echo htmlentities($article['category_name']); ?></a>
</nav>
<div class="row">
    <div class="main fl">
        <div class="single box-show">
            <article class="single-post">
                <header class="single-title">
                    <h1>
                        <a href="javascript:;" title="正在阅读：<?php echo htmlentities($article['title']); ?>" rel="bookmark"><?php echo htmlentities($article['title']); ?></a>
                    </h1>
                    <div class="single-info">
                        <span class="single-time">
                          <i class="icon font-time"></i><?php echo htmlentities($article['created_time']); ?>
                        </span>
                        <span class="single-views">
                            <i class="icon font-eye"></i>
                            <script src=/e/public/ViewClick/?classid=6&id=157&addclick=1></script>阅读
                        </span>
                        <span class="single-comment">
                          <i class="icon font-comment"></i>
                          <a href="/dianshang/157.html#comments">
                            <script src=/e/public/ViewClick/?classid=6&id=157&down=2></script>评论</a>
                        </span>
                        <div id="font-change" class="single-font fr">
                          <span id="font-dec">
                            <a title="减小字体">
                              <i class="icon font-minus-square-o"></i>
                            </a>
                          </span>
                            <span id="font-int">
                                <a title="默认字体">
                                  <i class="icon font-font"></i>
                                </a>
                            </span>
                            <span id="font-inc">
                                <a title="增大字体">
                                  <i class="icon font-plus-square-o"></i>
                                </a>
                            </span>
                          </div>
                    </div>
                </header>
                <div class="single-entry" id="editormd-view">
                    <textarea style="display:none;" name="test-editormd-markdown-doc"><?php echo htmlentities($article['content']); ?></textarea>
                </div>

                <footer class="entry-footer">
                    <?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="post-tags">
                        <a href="javascript:;" target="_blank"><?php echo htmlentities($vo['name']); ?></a>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </footer>

                <div>
                    <img src="/static/index/images/gongzhong.jpg" alt="公众号">
                </div>
                <div class="statement yc">文章版权声明：除非注明，否则均为
                    <span class="red">微客鸟窝</span>原创文章，转载或复制请以超链接形式并注明出处。
                </div>
            </article>

            <nav class="single-nav">
                <div class="entry-page-prev j-lazy" style="background-image: url(<?php echo htmlentities($prev['pic']); ?>);width: 42%;<?php if(empty($prev) || (($prev instanceof \think\Collection || $prev instanceof \think\Paginator ) && $prev->isEmpty())): ?>visibility:hidden;<?php endif; ?>">
                    <a href="<?php echo url('detail/'); ?><?php echo htmlentities($prev['id']); ?>" title="<?php echo htmlentities($prev['title']); ?>"><span><?php echo htmlentities($prev['title']); ?></span></a>
                    <div class="entry-page-info">
                        <span class="pull-left">« 上一篇</span>
                        <span class="pull-right"><?php echo htmlentities(date('Y-m-d',!is_numeric($prev['created_time'])? strtotime($prev['created_time']) : $prev['created_time'])); ?></span>
                    </div>
                </div>
                <div class="entry-page-prev j-lazy"
                     style="background-image: url(<?php echo htmlentities($next['pic']); ?>);width: 42%;float: right;<?php if(empty($next) || (($next instanceof \think\Collection || $next instanceof \think\Paginator ) && $next->isEmpty())): ?>visibility:hidden;<?php endif; ?>">
                    <a href="<?php echo url('detail/'); ?><?php echo htmlentities($next['id']); ?>" title="<?php echo htmlentities($next['title']); ?>">
                        <span><?php echo htmlentities($next['title']); ?></span></a>
                    <div class="entry-page-info">
                        <span class="pull-left">» 下一篇</span>
                        <span class="pull-right"><?php echo htmlentities(date('Y-m-d',!is_numeric($next['created_time'])? strtotime($next['created_time']) : $next['created_time'])); ?></span>
                    </div>
                </div>
            </nav>

        </div>

<!--        <div class="part-mor box-show">-->
<!--            &lt;!&ndash;相关文章 广告位&ndash;&gt;-->
<!--            <h3 class="section-title">-->
<!--                <span>相关阅读</span></h3>-->
<!--            <ul class="section-cont-tags pic-box-list clearfix">-->
<!--                <li>-->
<!--                    <a href="/dianshang/157.html">-->
<!--                        <i class="pic-thumb">-->
<!--                            <img class="lazy"-->
<!--                                 src="/d/file/p/2020/05-11/264d2e177fb6bae697286aee405be651.jpg"-->
<!--                                 alt="iPhone 9现身韩国电信零售店预约海报" title="iPhone 9现身韩国电信零售店预约海报"></i>-->
<!--                        <h3>iPhone 9现身韩国电信零售店预约海报</h3>-->
<!--                        <p>-->
<!--                            <b class="datetime">2020-02-08</b>-->
<!--                            <span class="viewd">6600 人在看</span></p>-->
<!--                    </a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->

        <section id="comments" class="box-show">
            <!--评论框-->
            <div id="comt-respond" class="commentpost wow fadeInDown">
                <h4>发表评论
                    <span>
                        <a rel="nofollow" id="cancel-reply" href="#comment" style="display:none;">
                        <small>取消回复</small></a>
                    </span>
                </h4>
                <!-- 评论 开始 -->

                <!-- 评论 结束 -->
            </div>
            <!--评论框结束-->
            <span class="icon icon_comment" title="comment"></span>
        </section>
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
<!-- <script src="js/zepto.min.js"></script>
		<script>
			var jQuery = Zepto;  // 为了避免修改flowChart.js和sequence-diagram.js的源码，所以使用Zepto.js时想支持flowChart/sequenceDiagram就得加上这一句
		</script> -->
<!--<script src="js/jquery.min.js"></script>-->
<script src="/markdown/lib/marked.min.js"></script>
<script src="/markdown/lib/prettify.min.js"></script>

<script src="/markdown/lib/raphael.min.js"></script>
<script src="/markdown/lib/underscore.min.js"></script>
<script src="/markdown/lib/sequence-diagram.min.js"></script>
<script src="/markdown/lib/flowchart.min.js"></script>
<script src="/markdown/lib/jquery.flowchart.min.js"></script>

<script src="/markdown/editormd.js"></script>
<script type="text/javascript">
    $(function() {
        var EditormdView;
        EditormdView = editormd.markdownToHTML("editormd-view", {
            //markdown        : markdown ,//+ "\r\n" + $("#append-test").text(),
            //htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
            htmlDecode      : "style,script,iframe",  // you can filter tags decode
            toc             : true,
            tocm            : true,    // Using [TOCM]
            tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
            //gfm             : false,
            //tocDropdown     : true,
            // markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
            emoji           : true,
            taskList        : true,
            tex             : true,  // 默认不解析
            flowChart       : true,  // 默认不解析
            sequenceDiagram : true,  // 默认不解析
        });

        //console.log("返回一个 jQuery 实例 =>", testEditormdView);
        // 获取Markdown源码
        //console.log(testEditormdView.getMarkdown());
        //alert(testEditormdView.getMarkdown());

    });
</script>

    </div>
</div>
<!--底部开始-->

<footer class="footer bg-dark">
    <div class="container">
        <div class="footer-fill">
            <div class="footer-column">
                <div class="footer-menu">
                    <a href="https://top.wekenw.com/" target="_blank" style="color:#3297fc;">wekenw简信息</a>
                </div>
                <div class="footer-copyright text-xs">
                    <p>Copyright &copy;
                        <a href="https://www.wekenw.com/" title="wekenw" target="_blank">www.wekenw.com</a>
                        | 备案号:<a rel="nofollow" href="http://beian.miit.gov.cn" target="_blank">
                            <span style="color:#3297fc;">京ICP备2021012843号-1</span>
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
<!--        <div class="footer-links">-->
<!--          <span>-->
<!--            <a class="ico-ico" href="http://beian.miit.gov.cn" rel="nofollow" target="_blank" title="京ICP备2021012843号-1">-->
<!--              <img src="/static/index/images/icp.png" alt="京ICP备2021012843号-1">京ICP备2021012843号</a>-->
<!--            <a class="beian-ico" target="_blank" href="http://beian.miit.gov.cn" rel="nofollow" title="京ICP备2021012843号-1">-->
<!--              <img src="/static/index/images/beian.png" alt="京ICP备2021012843号-1">京ICP备2021012843号-1</a>. 安全运行-->
<!--            <span id="iday"></span>天-->
<!--          </span>-->
<!--        </div>-->
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