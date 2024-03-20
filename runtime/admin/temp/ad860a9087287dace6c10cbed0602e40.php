<?php /*a:4:{s:56:"E:\WWW\phpPro\phpblog\app\admin\view\content\series.html";i:1644333522;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\layout.html";i:1634266574;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\header.html";i:1634266318;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\footer.html";i:1641541448;}*/ ?>
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
            <div class="layui-inline">
    <input class="layui-input" name="id" id="search" placeholder="名称" autocomplete="off">
</div>
<button class="layui-btn" data-type="reload" onclick="reload();">搜索</button>
<table class="layui-hide" id="datalist" lay-filter="datalist"></table>

<script type="text/html" id="toolbar">
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-sm" lay-event="delData">删除</button>
        <button class="layui-btn layui-btn-sm" lay-event="add">添加</button>
    </div>
</script>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="join">添加文章</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>

<script>
    var url="<?php echo htmlentities($current_url); ?>";
    layui.use(['layer','table','transfer','util'], function(){
        var table = layui.table
            ,transfer = layui.transfer
            ,layer = layui.layer
            ,util = layui.util
            ,$ = layui.jquery;

        table.render({
            elem: '#datalist'
            ,id: 'datalist'
            ,url:url
            ,toolbar: '#toolbar' //开启头部工具栏，并为其绑定左侧模板
            ,title: '标签数据表'
            ,cols: [[
                {type: 'checkbox', fixed: 'left'}
                ,{field:'id', title:'ID',  fixed: 'left', width:80, unresize: true, sort: true}
                ,{field:'name', title:'名称',edit: 'text'}
                ,{field:'created_time', title:'创建时间', sort: true, templet: function(res){
                        return layui.util.toDateString(res.created_time, 'yyyy-MM-dd HH:mm:ss');
                    }}
                ,{fixed: 'right', title:'操作', toolbar: '#barDemo'}
            ]]
            , limit: 10 //注意：请务必确保 limit 参数（默认：10）是与你服务端限定的数据条数一致
            ,page: true
        });

        //监听单元格编辑
        table.on('edit(datalist)', function(obj){
            var value = obj.value //得到修改后的值
                ,data = obj.data //得到所在行所有键值
                ,field = obj.field; //得到字段

            var container = {};
            container [field]=value;
            container['id']=data.id;
            $.ajax({
                url:'/admin/deal/edit?table=series',
                dataType:'json',
                type:'POST',
                data:container,
                success:function(data){
                    if(data.code === 1){
                        layer.msg('success');
                    }else{
                        layer.msg(data.msg);
                    }
                }
            })
        });

        //头工具栏事件
        table.on('toolbar(datalist)', function(obj){
           // console.log(obj);
            var checkStatus = table.checkStatus(obj.config.id);
            switch(obj.event){
                case 'delData':
                    var data = checkStatus.data;
                    var arr = [];
                    for (var i = 0; i < data.length; i++) { //循环筛选出id
                        arr.push(data[i].id);
                    }
                    //console.log(arr);
                    layer.confirm('真的删除么', function(index){
                        $.ajax({
                            url:'/admin/deal/del?table=series',
                            dataType:'json',
                            type:'POST',
                            data:{'ids':arr.join(',')},
                            success:function(data){
                                if(data.code === 1){
                                    layer.msg('success');
                                    reload();
                                }else{
                                    layer.msg(data.msg);
                                }
                            }
                        })

                        layer.close(index);
                    });
                    break;
                case 'add':
                    layer.prompt({title: '输入系列标题，并确认', formType: 3}, function(text, index){
                        $.ajax({
                            url:'/admin/deal/add?table=series',
                            dataType:'json',
                            type:'POST',
                            data:{'name':text},
                            success:function(data){
                                console.log(data)
                                if(data.code === 1){
                                    layer.msg('success');
                                    reload();
                                    layer.close(index);
                                }else{
                                    layer.msg(data.msg);
                                }
                            }
                        })
                    });
                    break;
            };
        });

        //监听行工具事件
        table.on('tool(datalist)', function(obj){
            var data = obj.data;
            if(obj.event === 'del'){
                layer.confirm('真的删除么', function(index){
                    $.ajax({
                        url:'/admin/deal/del?table=series',
                        dataType:'json',
                        type:'POST',
                        data:{'ids':data.id},
                        success:function(data){
                            if(data.code === 1){
                                layer.msg('success');
                                obj.del();
                            }else{
                                layer.msg(data.msg);
                            }
                        }
                    })

                    layer.close(index);
                });
            } else if(obj.event === 'edit'){
                layer.prompt({
                    formType: 2
                    ,value: data.href
                }, function(value, index){
                    $.ajax({
                        url:'/admin/deal/edit?table=series',
                        dataType:'json',
                        type:'POST',
                        data:{'id':data.id,'name':value},
                        success:function(data){
                            if(data.code === 1){
                                layer.msg('success');
                                obj.update({
                                    name: value
                                });
                            }else{
                                layer.msg(data.msg);
                            }
                        }
                    })

                    layer.close(index);
                });
            } else if(obj.event === 'join'){
                Transfer(data.id);
            }
        });


        // 穿梭框--文章归类 ---start
        window.Transfer = function (id){
            layer.open({
                type: 1
                , id: 'joinAlert' //防止重复弹出
                , shadeClose: true
                , shade: 0.4
                , scrollbar: false
                , title: '设置'
                , area: ['1000px', '500px']
                , maxmin: true
                ,content: '<div id="join" class="demo-transfer" style="padding: 10px;"></div>'
            });

            $.ajax({
                url:'series_info',
                dataType:'json',
                type:'POST',
                data:{'id':id},
                success:function(data){
                    if(data.code === '1'){
                        transfer.render({
                            elem: '#join'
                            ,width:450
                            ,height:400
                            ,data: data.data1
                            ,title: ['未归档', '已归档']
                            ,showSearch: true
                            ,value: data.data2
                            ,onchange: function(obj, index){
                                ArticleArchive(id, obj, index);
                            }
                        })
                    }else{
                        layer.msg('error!!!');
                    }
                }
            })


        }
        window.ArticleArchive = function (seriesid, obj, type){
            var ids = [];
            obj.forEach((elem, index) => {
                ids.push(elem.value)
            });
            $.ajax({
                url:'series_save',
                dataType:'json',
                type:'POST',
                data:{'seriesid':seriesid,'type':type,'ids':ids.toString()},
                success:function(data){
                    layer.msg(data);
                }
            })
        }
        // 穿梭框--文章归类 ---end

        window.reload = function() {
            var search = $('#search');
            //执行重载
            table.reload('datalist', {
                page: {
                    curr: 1 //重新从第 1 页开始
                }
                ,where: {
                    key: {
                        name: search.val()
                    }
                }
            });
        }

    });
</script>
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © wekenw.com
    </div>
</div>

</body>
</html>