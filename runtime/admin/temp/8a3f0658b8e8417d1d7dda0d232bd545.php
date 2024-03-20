<?php /*a:3:{s:53:"E:\WWW\phpPro\phpblog\app\admin\view\configs\add.html";i:1622359347;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\header.html";i:1622626569;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\footer.html";i:1622276682;}*/ ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>  - wekenw</title>
    <link rel="stylesheet" href="/static/admin/css/layui.css">
</head>
<div style="margin:10px;">
    <form class="layui-form layui-form-pane" action="" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">链接</label>
            <div class="layui-input-block">
                <input type="text" name="href" lay-verify="required" autocomplete="off" placeholder="请输入链接" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">名称</label>
            <div class="layui-input-inline">
                <input type="text" name="title" lay-verify="title" placeholder="请输入标题" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">开关-开</label>
                <div class="layui-input-block">
                    <input type="checkbox" checked="" name="status" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF" title="开关">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">权重</label>
                <div class="layui-input-inline">
                    <input type="text" name="weight" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">越大越靠前</div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="/static/admin/layui.js"></script>
<script>
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer

        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 3){
                    return '标题至少得3个字符啊';
                }
            }
        });

        //监听提交
        form.on('submit(submit)', function(data){
            $.ajax({
                url:'',
                dataType:'json',
                type:'POST',
                // data:JSON.stringify(),
                data:data.field,
                success:function(data){
                    if(data.status === '1'){
                        layer.msg('success');
                    }else{
                        layer.msg('error');
                    }
                }

            })
            return false;
        });
    });
</script>