<?php /*a:2:{s:53:"E:\WWW\phpPro\phpblog\app\Index\view\index\index.html";i:1621416444;s:52:"E:\WWW\phpPro\phpblog\app\Index\view\index\base.html";i:1621415451;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="renderer" content="webkit">
    <title>wucs博客</title>
    <meta name="keywords" content="wekenw博客系统,微牛部落"/>
    <meta name="description" content="本站点是wekenw博客系统，提供给各界人士使用，笔记管理，文章发表..."/>
    <meta name="author" content="wekenw">
    <link rel="stylesheet" href="/static/index/css/animate.css" type="text/css" media="all"/>
    <link rel="icon" href="/static/index/favicon.ico" type="image/x-icon">
    <script src="/static/index/js/jquery-2.2.4.min.js"></script>
    <script src="/static/index/js/zblogphp.js"></script>
    <script src="/static/index/js/c_html_js_add.js"></script>
    <script src="/static/index/js/swiper.min.js"></script>
    <link rel="stylesheet" href="/static/index/css/swiper.min.css" type="text/css" media="all"/>
    <link href="/static/index/css/style.css" type="text/css" media="all" rel="stylesheet"/>
    <!--[if lt IE 9]>
      <script src="/static/index/js/html5shiv.js"></script>
    <![endif]-->
    

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
                                <a href="{% url 'blog:index">
                                    <i class="fa fa-home"></i>首页</a>
                            </li>
                            {% get_categories 1 0 as categories %}
                            {% for cate in categories %}
                            <li id="navbar-category-{{ forloop.counter }}" class="">
                                <a href="{{ cate.get_absolute_url }}">
                                {% if cate.verboseName %}{{ cate.verboseName }}{% else %}{{ cate.name }}{% endif %}
                                </a>
                                {% get_categories 1 cate.id as childcate %}
                                {% if childcate %}
                                    <ul class="dropdown-menu sub-menu">
                                    {% for ch in childcate %}
                                    <li id="navbar-page-{{ forloop.parentloop.counter }}"><a href="{{ ch.get_absolute_url }}">{% if ch.verboseName %}{{ ch.verboseName }}{% else %}{{ ch.name }}{% endif %}</a></li>
                                    {% endfor %}
                                </ul>
                                {% endif %}
                            </li>
                            {% endfor %}

                            <li id="navbar-category-11" class=""><a href="/resume/" target="_blank">我的简历</a></li>
                            <li id="navbar-category-12" class=""><a href="/zhuanlan/">用户专栏</a>
                                <ul class="dropdown-menu sub-menu">
                                    <li id="navbar-page-12"><a href="/zhuanlan/about/">关于我们</a></li>
                                    <li id="navbar-page-12"><a href="/zhuanlan/contact/">联系我们</a></li>
                                    <li id="navbar-page-12"><a href="/zhuanlan/cooperation/">内容合作</a></li>
                                </ul>
                            </li>
                        </ul>
                        </li>
                        </ul>
                    </aside>
                </div>
                <div class="top-bar-right text-right fr">
                    <div class="top-admin">
                        {% if request.user.is_authenticated %}
                            <div class="login">
                                »&nbsp;<span style="color:red;"><b>{{ request.user }}</b></span>&nbsp;&nbsp;
                                <a href="{% url 'member:info" target="_blank">我的空间</a>&nbsp;&nbsp;
{#                                <a href="/" target="_blank">短信息</a>&nbsp;&nbsp;#}
                                <a href="{% url 'users:logout" onclick="return confirm('确认要退出?');">退出</a>
                            </div>
                        {% else %}
                            <div class="login">
                                <form name="login" method="post" action="{% url 'users:login">
                                    {% csrf_token %}
                                    <input type="hidden" name="enews" value="login">
                                    <input type="hidden" name="ecmsfrom" value="9">
                                    用户名：<input name="username" type="text" class="inputText" size="16">&nbsp;
                                    密码：<input name="password" type="password" class="inputText" size="16">&nbsp;
                                    <input type="submit" name="Submit" value="登陆" class="inputSub">&nbsp;
                                    <input type="button" name="Submit2" value="注册" class="inputSub" onclick="window.open('{% url "users:register" %}');">
                                </form>
                            </div>
                        {% endif %}
                    </div>
                </div>
            </div>

            <div class="container secnav clearfix">
                <div class="fav-subnav">
                    <div class="top-bar-left pull-left navlogo">
                        <a href="/" class="logo box">
                            <b class="shan logofont">wucs</b>
                        </a>
                        <span style="font-family: 华文新魏;margin-left: 30px;">
                            <span style="color: rgba(255, 0, 0, 1)" color="#ff0000">w</span>
                            <span style="color: rgba(255, 137, 0, 1)" color="#ff8900">e</span>
                            <span style="color: rgba(146, 192, 0, 1)" color="#92c000">k</span>
                            <span style="color: rgba(0, 192, 36, 1)" color="#00c024">e</span>
                            <span style="color: rgba(255, 137, 0, 1)" color="#ff8900">n</span>
                            <span style="color: rgba(0, 192, 218, 1)" color="#00c0da">w</span>
                        </span>
                            {# <img class="sublogo" alt="wekenw" src="/static/index/images/sublogo.png">#}
                    </div>
                    <div class="search-warp clearfix">
                        <form name="searchform" method="GET" action="/search/" id="searchform">
                            <div class="search-area">
                                <input class="search-input" placeholder="{{ keyword|default:"搜索感兴趣的知识和文章" }}" type="text" name="keyword"
                                       id="keyboard"></div>
                            <button class="showhide-search" type="submit">
                                <i class="icon font-search"></i>搜索一下
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="percentageCounter"></div>
        </div>
    </header>
    <!--头部结束-->
    <div class="main-content container clearfix" style="margin-top: 175px;">
        
        <div class="row">
            <div class="main fl">
                <div class="wrapper-ban">
                    <div class="swiper-container swiper-main">
                        <div class="swiper-wrapper">
                            <?php $list = $cc = array(1,2,3); foreach($list as $key=>$vo): ?>
                                <div class="swiper-slide">
                                    <a href="https://www.nx10.cn/" target="_blank">
                                        <img src="{% static 'images/banner1.jpg' %}" alt="首页轮播文字">
                                        <span class="swiper-title">首页轮播文字{{ i }}</span></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>

                <div class="top_list">
                    {% get_hot_articles 10 as hotList %}
                    {% for art in hotList %}
                        {% if forloop.counter <= 4 %}
                        <div class="col-small">
                            <div class="col-pic">
                                <a href="{{ art.get_absolute_url }}" title="{{ art.title }}">
                                    <img src="{% static 'd/file/p/2020/02-13/9046549fd43b04a946ce1fff5974adcd.jpg' %}"
                                         width="100" height="75" alt="{{ art.title }}"></a>
                            </div>
                            <div class="col-info">
                                <h3>
                                    <a href="{{ art.get_absolute_url }}" title="{{ art.title }}" class="col-title">{{ art.title }}</a></h3>
                                <p class="col-desc">{{ art.excerpt|truncatechars:50 }}</p>
                            </div>
                        </div>
                        {% endif %}
                    {% endfor %}

                    <ul class="col-large">
                        {% for art in hotList %}
                            {% if forloop.counter >= 5 %}
                            <li>
                                <em class="color-{{ forloop.counter }}">{{ forloop.counter }}</em>
                                <span class="list-date">2020-02-08</span>
                                <a href="{{ art.get_absolute_url }}" title="{ art.title }}">{{ art.title }}</a>
                            </li>
                            {% endif %}
                        {% endfor %}
                    </ul>
                </div>

                <div class="side-hot auto-side">
                    <div class="home-main auto-main">
                        <!--页面主体信息-->
                        {% for art in article_list %}
                            <article class="post-list blockimg picsrcd auto-list wow fadeInDown" id="list{{ forloop.counter }}">
                                <div class="entry-container">
                                    <div class="block-image feaimg">
                                        <a class="block-fea" href="{{ art.get_absolute_url }}" title="{{ art.title }}">
                                            <img class="lazy"
                                                 src="{% static 'd/file/p/2020/09-12/2bafdb345b115a130fd38b70d51c1010.jpg' %}"
                                                 alt="{{ art.title }}" title="{{ art.title }}">
                                        </a>
                                        <div class="item-slant reverse-slant bg-orange"></div>
                                        <div class="item-slant"></div>
                                    </div>
                                    <header class="entry-header">
                                        <h2 class="entry-title">
                                            <a href="{{ art.get_absolute_url }}">
                                                {% if art.pv > 100 %}
                                                <span class="badge arc_v4">热文</span>
                                                {% endif %}
                                                {{ art.title }}
                                            </a>
                                        </h2>
                                    </header>
                                    <div class="entry-summary ss">
                                        <p>
                                            {{ art.excerpt }}...</p>
                                    </div>
                                    <div class="entry-meta fea-meta">hh
                                        <a>admin <span class="separator">/</span></a>
                                        <a class="meta-cate" href="/jianzhan/">大数据 <span class="separator">/</span></a>
                                        <time datetime="2020-09-12">2020-09-12 <span class="separator">/</span></time>
                                        <a class="meta-viewnums" href="/jianzhan/167.html#comments">0 评论
                                            <span class="separator">/</span></a>
                                        <span class="meta-viewnums">73 阅读</span></div>
                                </div>
                            </article>
                        {% endfor %}
                        <!--分页-->
                        {% if is_paginated %}
                            {{ page_obj.render }}
                        {% endif %}
                    </div>
                </div>
            </div>
            <!--博主介绍-->
            {% include 'blog/side.html' %}
        </div>

        <div id="primary" class="side-primary wow fadeInDown" data-wow-delay="0.25s">
            <div class="side-title-wrap">
                <h3 class="widget-title">互联资讯</h3>
                <span>自定义此处文字内容</span></div>
            <div class="side-box">
                <ul class="side-main">
                    {% for foo in '12346'|make_list %}
                    <li class="side-list side-list-box">
                        <a href="/zixun/153.html" title="国外机构测得iPhone 11 Pro辐射量超标137%" class="block">
                            <img src="{% static 'images/grey.gif' %}" alt="国外机构测得iPhone 11 Pro辐射量超标137%" width="130"
                                 height="98"
                                 style="background: url({% static 'd/file/p/2020/02-13/1bed23fb41166bdec133a4ea723068b9.jpg' %}) center center / cover no-repeat;"></a>
                        <div class=" side-h3-title">
                            <h3>
                                <a href="/zixun/153.html" title="国外机构测得iPhone 11 Pro辐射量超标137%">国外机构测得iPhone 11
                                    Pro辐射量超标137%</a></h3>
                            <small>2020-02-08</small>
                        </div>
                        <p>
                            <a href="/zixun/153.html" title="国外机构测得iPhone 11 Pro辐射量超标137%">　　国外机构测得iPhone 11
                                Pro辐射量超标137%　　无论是三方出货数据还是苹果财报(截至去年12月28日)，都证明iPhone 11系列的市场热情不低，仍颇受消费者欢迎。　　...</a></p>
                    </li>
                    {% endfor %}
                </ul>
            </div>
        </div>

        <div class="line-big">
            <div class="line-box wow fadeInDown">
                <h3 class="cat-title bkx">
                    <span class="badge arc_v2">系列文章</span>
                    <a href="#">大数据
                        <span class="more-i">
                          <span></span>
                          <span></span>
                          <span></span>
                        </span>
                    </a>
                </h3>
                <div class="cat-site">
                    <figure class="small-thumbnail">
                        <a class="sc" href="/jianzhan/167.html">
                            <img src="{% static 'd/file/p/2020/09-12/2bafdb345b115a130fd38b70d51c1010.jpg' %}"
                                 alt="内容页面插入带权限的会员下载还有正文同时存在">
                        </a>
                    </figure>
                    <h2 class="entry-small-title">
                        <a href="/jianzhan/167.html" rel="bookmark">内容页面插入带权限的会员下载还有正文同时存在</a>
                    </h2>
                    <ul class="cat-list">
                        {% for foo in '12346'|make_list %}
                        <li>
                            <span class="list-date">09-12</span>
                            <a href="/jianzhan/167.html" rel="bookmark">内容页面插入带权限的会员下载还有正文同时存在</a>
                        </li>
                        {% endfor %}
                    </ul>
                </div>
            </div>
            <div class="line-box wow fadeInDown">
                <h3 class="cat-title bkx">
                    <span class="badge arc_v6">系列文章</span>
                    <a href="#">网络运营
                        <span class="more-i">
                          <span></span>
                          <span></span>
                          <span></span>
                        </span>
                    </a>
                </h3>
                <div class="cat-site">
                    <figure class="small-thumbnail">
                        <a class="sc" href="/yunying/50.html">
                            <img src="{% static 'd/file/p/2020/02-08/05f3e86d4d8543d8e8c24d473324c373.jpg' %}"
                                 alt="百度智能小程序“产品实验室”已开通使用Discuz论坛">
                        </a>
                    </figure>
                    <h2 class="entry-small-title">
                        <a href="/yunying/50.html" rel="bookmark">百度智能小程序“产品实验室”已开通使用Discuz论坛</a></h2>
                    <ul class="cat-list">
                        {% for foo in '12346'|make_list %}
                        <li>
                            <span class="list-date">02-08</span>
                            <a href="/yunying/50.html" rel="bookmark">百度智能小程序“产品实验室”已开通使用Discuz论坛</a>
                        </li>
                        {% endfor %}
                    </ul>
                </div>
            </div>
            <div class="line-box wow fadeInDown">
                <h3 class="cat-title bkx">
                    <span class="badge arc_v4">系列文章</span>
                    <a href="#">创业动态
                        <span class="more-i">
                          <span></span>
                          <span></span>
                          <span></span>
                        </span>
                    </a>
                </h3>
                <div class="cat-site">
                    <figure class="small-thumbnail">
                        <a class="sc" href="/chuangye/63.html">
                            <img src="{% static 'd/file/p/2020/02-08/93eaf389fd981fd3987e6bdea6ddbb2d.jpg' %}"
                                 alt="互撕、互喷、互怼，2019八大battle时刻">
                        </a>
                    </figure>
                    <h2 class="entry-small-title">
                        <a href="/chuangye/63.html" rel="bookmark">互撕、互喷、互怼，2019八大battle时刻</a></h2>
                    <ul class="cat-list">
                        {% for foo in '12346'|make_list %}
                        <li>
                            <span class="list-date">02-08</span>
                            <a href="/chuangye/63.html" rel="bookmark">互撕、互喷、互怼，2019八大battle时刻</a></li>
                        <li>
                        {% endfor %}
                    </ul>
                </div>
            </div>
        </div>

        <div class="link-box box-shadow wow fadeInDown">
            <!--友情链接-->
            <section class="links-title">
                <h3>友情链接</h3>
                <span class="suburl">
                      <a href="/" target="_blank">更多
                        <i class="icon font-add-circle"></i></a>
                    </span>
            </section>
            <ul id="links-home">
                {% get_links 10 as links %}
                {% for link in links %}
                <li><a href="{{ link.href }}" target="_blank" title="{{ link.title }}">{{ link.title }}</a></li>
                {% endfor %}
            </ul>
        </div>

    </div>
</div>
<!--底部开始-->

<footer class="footer bg-dark">
    <div class="container">
        <div class="footer-fill">
            <div class="footer-column">
                <div class="footer-menu">
                    <a href="https://top.wekenw.com/" target="_blank">wekenw简信息</a>
                </div>
                <div class="footer-copyright text-xs">
                    <p>Copyright &copy; 2015-2020 wekenw
                        <a href="https://www.wekenw.com/" title="wekenw" target="_blank">www.wekenw.com</a>
                        | 备案号:<a rel="nofollow" href="http://www.beian.miit.gov.cn/" target="_blank">
                            <span style="color:#3297fc;">粤ICP备80253699号-5</span>
                        </a> |
                        <a href="#" target="_blank"><span style="color:#3297fc;">网站地图</span></a>
                    </p>
                </div>
            </div>
            <div class="flex-md-fill"></div>
            <div class="footer-f-pic">
                <a href="tencent://message/?uin=888888888&Site=qq&Menu=yes" rel="nofollow" target="_blank" title="企鹅号">
              <span>
                <i class="icon font-qq"></i>
              </span>
                </a>
                <a href="javascript:" class="btn-icon fr-2">
              <span>
                <i class="icon font-weixin"></i>
              </span>
                    <span class="bg-qrcode" style="background-image:url(/static/index/images/weixin.png);"></span>
                </a>
            </div>
        </div>
        <div class="footer-links">
          <span>
            <a class="ico-ico" href="http://beian.miit.gov.cn" rel="nofollow" target="_blank" title="粤ICP备80253699号-5">
              <img src="/static/index/images/icp.png" alt="粤ICP备80253699号-5">粤ICP备80253699号-5</a>
            <a class="beian-ico" target="_blank" href="/" rel="nofollow" title="京公网安备11000000000001号">
              <img src="/static/index/images/beian.png" alt="京公网安备11000000000001号">京公网安备11000000000001号</a>. 安全运行
            <span id="iday"></span>天
            <script>function siteRun(d) {
                var nowD = new Date();
                return parseInt((nowD.getTime() - Date.parse(d)) / 24 / 60 / 60 / 1000)
            }

            document.getElementById("iday").innerHTML = siteRun("2000/01/01");</script>
          </span>
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