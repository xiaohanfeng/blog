<?php /*a:4:{s:54:"E:\WWW\phpPro\phpblog\app\admin\view\member\index.html";i:1623813526;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\layout.html";i:1623813629;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\header.html";i:1622626569;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\footer.html";i:1622276682;}*/ ?>
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
            <div class="layui-tab">
    <ul class="layui-tab-title">
        <li class="layui-this">基本信息</li>
        <li>教育信息</li>
        <li>工作信息</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <form class="layui-form" action="">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">用户昵称:</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入用户昵称" class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">姓名:</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" value="wucs" class="layui-input" disabled="" style="border:unset;">
                        </div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">出生日期</label>
                        <div class="layui-input-inline">
                            <input type="text" name="birthday" id="birthday" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">开始工作</label>
                        <div class="layui-input-inline">
                            <input type="text" name="start_work" id="startWork" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">性别</label>
                    <div class="layui-input-block">
                        <input type="radio" name="sex" value="男" title="男" checked="">
                        <input type="radio" name="sex" value="女" title="女">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">所在地区</label>
                    <div class="layui-input-inline">
                        <select name="province" lay-filter="province">
                            <option value="">请选择省</option>
                            <?php if(is_array($provinces) || $provinces instanceof \think\Collection || $provinces instanceof \think\Paginator): $i = 0; $__LIST__ = $provinces;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pr): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo htmlentities($pr['province']); ?>" <?php if($province == $pr['province']): ?>selected<?php endif; ?> title="<?php echo htmlentities($pr['provinceid']); ?>"><?php echo htmlentities($pr['province']); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="layui-input-inline">
                        <select name="city" lay-filter="city" id='city'>
                            <option value="">请选择市</option>
                            <?php if(is_array($cities) || $cities instanceof \think\Collection || $cities instanceof \think\Paginator): $i = 0; $__LIST__ = $cities;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ci): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo htmlentities($ci['city']); ?>" <?php if($city == $ci['city']): ?>selected<?php endif; ?> title="<?php echo htmlentities($ci['cityid']); ?>"><?php echo htmlentities($ci['city']); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="layui-input-inline">
                        <select name="area" lay-filter="area" id='area'>
                            <option value="">请选择县/区</option>
                            <?php if(is_array($areas) || $areas instanceof \think\Collection || $areas instanceof \think\Paginator): $i = 0; $__LIST__ = $areas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ar): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo htmlentities($ar['area']); ?>" <?php if($area == $ar['area']): ?>selected<?php endif; ?>><?php echo htmlentities($ar['area']); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">个人简介</label>
                    <div class="layui-input-block">
                        <textarea placeholder="你很懒，还没有添加简介" name="intro" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit" class="layui-btn layui-btn-primary layui-border-green" lay-submit="" lay-filter="form1">保存</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="layui-tab-item">
            <form class="layui-form" action="">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">学校名称:</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入用户昵称" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">专业:</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入用户昵称" class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">入学时间</label>
                        <div class="layui-input-inline" style="width: 100px;">
                            <input type="text" name="admission_time" id="admission_time" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid">-</div>
                        <div class="layui-input-inline" style="width: 100px;">
                            <input type="text" name="admission_time1" id="admission_time1" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">学历:</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入用户昵称" class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit" class="layui-btn layui-btn-primary layui-border-blue" lay-submit="" lay-filter="form2">保存</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="layui-tab-item">
            <form class="layui-form" action="">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">公司名称:</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入用户昵称" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">职位名称:</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入用户昵称" class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">所属行业:</label>
                        <div class="layui-input-block">
                            <select name="interest" lay-filter="aihao">
                                <option value=""></option>
                                <option value="0">金融</option>
                                <option value="1" selected="">教育</option>
                                <option value="2">电商</option>
                                <option value="3">传媒</option>
                                <option value="4">健康医疗</option>
                                <option value="4">游戏</option>
                                <option value="4">娱乐</option>
                                <option value="4">社交</option>
                                <option value="4">电子</option>
                                <option value="4">媒体</option>
                                <option value="4">零售</option>
                                <option value="4">交通物流</option>
                                <option value="4">制造</option>
                                <option value="4">能源</option>
                                <option value="4">旅游</option>
                                <option value="4">政务</option>
                                <option value="4">其他</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit" class="layui-btn layui-btn-primary layui-border-orange" lay-submit="" lay-filter="form3">保存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<style>
    .layui-border-green {
        border-color: #009688!important;
        color: #009688!important;
    }
    .layui-border-orange {
        border-color: #FFB800!important;
        color: #FFB800!important;
    }
    .layui-border-blue {
        border-color: #1E9FFF!important;
        color: #1E9FFF!important;
    }
</style>

<script>

    layui.use(['form', 'laydate', 'layer', 'laydate'], function() {
        var form = layui.form
            , laydate = layui.laydate
            , $ = layui.$
            , layer = layui.layer;

        //日期
        laydate.render({
            elem: '#birthday'
        });
        laydate.render({
            elem: '#startWork'
        });
        laydate.render({
            elem: '#admission_time'
        });
        laydate.render({
            elem: '#admission_time1'
        });
        laydate.render({
            elem: '#date'
        });
        laydate.render({
            elem: '#date1'
        });

        form.on('select(province)', function (data) {
            console.log('123');
            var provinceid = data.elem[data.elem.selectedIndex].title;
            $.ajax({
                type: 'POST',
                url: "<?php echo url('admin/member/getcity'); ?>",
                data: {'provinceid': provinceid},
                dataType: 'json',
                success: function (data) {
                    $("#city").empty();
                    $("#city").append("<option value=''>市</option>");
                    for (var i = 0; i < data.length; i++) {
                        $("#city").append("<option value='" + data[i].city + "' title='" + data[i].cityid + "'>" + data[i].city + "</option>");
                    }
                    form.render('select');
                }
            });
        })
        form.on('select(city)', function (data) {
            var cityid = data.elem[data.elem.selectedIndex].title;
            $.ajax({
                type: 'POST',
                url: "<?php echo url('admin/member/getarea'); ?>",
                data: {'cityid': cityid},
                dataType: 'json',
                success: function (data) {
                    $("#area").empty();
                    $("#area").append("<option value=''>区/县</option>");
                    for (var i = 0; i < data.length; i++) {
                        $("#area").append("<option value='" + data[i].area + "'>" + data[i].area + "</option>");
                    }
                    form.render('select');
                }
            });
        })

        //监听提交
        form.on('submit(form1)', function(data){
            layer.alert(JSON.stringify(data.field), {
                title: '最终的提交信息'
            })
            return false;
        });

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