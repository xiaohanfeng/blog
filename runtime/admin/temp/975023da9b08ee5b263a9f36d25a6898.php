<?php /*a:4:{s:53:"E:\WWW\phpPro\phpblog\app\admin\view\index\index.html";i:1634016592;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\layout.html";i:1634266574;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\header.html";i:1634266318;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\footer.html";i:1641541448;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理 - wekenw</title>
    <link rel="stylesheet" href="/static/admin/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">-会员中心</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="">商品管理</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item"><a href="/">前台首页</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    贤心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree" lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">站点管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('admin/member/info'); ?>">个人资料</a></dd>
                        <dd><a href="<?php echo url('admin/member/account'); ?>">账号设置</a></dd>
                        <dd><a href="<?php echo url('admin/configs/links'); ?>">友情链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">内容创作</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('admin/content/post'); ?>" target="_blank">发布博文</a></dd>
                        <dd><a href="<?php echo url('admin/content/category'); ?>">上传资源</a></dd>
                        <dd><a href="<?php echo url('admin/content/tags'); ?>">上传视频</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">内容管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('admin/content/list'); ?>">文章</a></dd>
                        <dd><a href="<?php echo url('admin/content/tags'); ?>">标签</a></dd>
                        <dd><a href="<?php echo url('admin/content/category'); ?>">类别</a></dd>
                        <dd><a href="<?php echo url('admin/content/series'); ?>">系列</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="<?php echo url('admin/my/resume'); ?>">个人简历</a></li>
            </ul>
        </div>
    </div>
    <!--<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>-->
<!--<script src="https://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>-->
<script src="/static/admin/jquery.2.1.4.min.js"></script>
<script src="/static/admin/layui.js"></script>

    <script>
        //JavaScript代码区域
        layui.use('element', function(){
            var element = layui.element;

        });
    </script>
    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            welcome~
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © wekenw.com
    </div>
</div>

</body>
</html>