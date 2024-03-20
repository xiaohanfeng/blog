<?php /*a:4:{s:56:"E:\WWW\phpPro\phpblog\app\admin\view\member\account.html";i:1623827260;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\layout.html";i:1623822999;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\header.html";i:1622626569;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\footer.html";i:1622276682;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>  - wekenw</title>
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
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="<?php echo url('admin/my/resume'); ?>">个人简历</a></li>
            </ul>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
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
            <fieldset class="layui-elem-field">
    <legend>账号设置</legend>
    <div class="layui-field-box">
        <table class="layui-table" lay-skin="nob">
            <colgroup>
                <col width="150">
                <col width="150">
                <col width="100">
                <col width="200">
                <col>
            </colgroup>
            <thead>
            </thead>
            <tbody>
            <tr>
                <td>密&nbsp;&nbsp;&nbsp;码</td>
                <td></td>
                <td>存在风险，请设置密码</td>
                <td><a class="linkblue" id="setpwd" href="javascript:;">设置密码</a></td>
            </tr>
            <tr>
                <td>手&nbsp;&nbsp;&nbsp;机</td>
                <td></td>
                <td>13021166443</td>
                <td><a class="linkblue" id="setmobile" href="javascript:;">修改手机</a></td>
            </tr>
            <tr>
                <td>邮&nbsp;&nbsp;&nbsp;箱</td>
                <td></td>
                <td>存在风险，请绑定邮箱</td>
                <td><a class="linkblue" id="setemail" href="javascript:;">绑定邮箱</a></td>
            </tr>
            <tr>
                <td>三&nbsp;方&nbsp;账&nbsp;号</td>
                <td></td>
                <td>QQ 微信</td>
                <td><a class="linkblue" href="javascript:;">立即设置</a></td>
            </tr>
            <tr>
                <td>登&nbsp;录&nbsp;记&nbsp;录</td>
                <td></td>
                <td></td>
                <td><a class="linkblue" href="javascript:;">查看记录</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</fieldset>

<fieldset class="layui-elem-field" style="margin-top:50px;">
    <legend>隐私设置</legend>
    <div class="layui-field-box">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <label class="layui-form-label">工作信息</label>
                <div class="layui-input-inline" style="width: 70px;">
                    <input type="checkbox" name="work" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF">
                </div>
                <div class="layui-form-mid layui-word-aux">开启后在个人主页等模块向他人展示工作信息</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">教育信息</label>

                <div class="layui-input-inline" style="width: 70px;">
                    <input type="checkbox" name="edu" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF">
                </div>
                <div class="layui-form-mid layui-word-aux">开启后在个人主页等模块向他人展示教育信息</div>
            </div>
        </form>
    </div>
</fieldset>



<style>
    .linkblue{color:blue;}
</style>

<script>

    layui.use(['form', 'laydate', 'layer'], function() {
        var form = layui.form
            , $ = layui.$
            , layer = layui.layer;

        $("#setpwd").click(function(){
            layer.open({
                type: 2 //此处以iframe
                , id: 'layerAdd' //防止重复弹出
                , shadeClose: true
                , shade: 0.4
                , scrollbar: false
                , title: '设置'
                , area: ['500px', '300px']
                , maxmin: true
                , content: '/admin/member/setpwd'
            });
        })

    })
</script>
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © wekenw.com - 123
    </div>
</div>

</body>
</html>