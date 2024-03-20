<?php /*a:3:{s:55:"E:\WWW\phpPro\phpblog\app\admin\view\Member\setpwd.html";i:1623829690;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\header.html";i:1622626569;s:48:"E:\WWW\phpPro\phpblog\app\admin\view\footer.html";i:1622276682;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>  - wekenw</title>
    <link rel="stylesheet" href="/static/admin/css/layui.css">
</head>
<body>
    <form class="layui-form layui-form-pane" action="" style="margin:30px;padding-left: 50px;">
    <div class="layui-form-item">
        <label class="layui-form-label" style="width:130px;">输入旧密码：</label>
        <div class="layui-input-inline">
            <input type="password" name="oldpwd" lay-verify="required" placeholder="旧密码" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" style="width:130px;">输入新密码：</label>
        <div class="layui-input-inline">
            <input type="password" name="newpwd" lay-verify="newpwd" placeholder="11-20位数字和字母组合" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" style="width:130px;">确认新密码：</label>
        <div class="layui-input-inline">
            <input type="password" name="confirmpwd" lay-verify="confirmpwd" placeholder="确认新密码" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
        </div>
    </div>
</form>
</body>
</html>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="/static/admin/layui.js"></script>

<script>
    layui.use(['layer','form','upload'], function() {
        var form = layui.form
            , $ = layui.jquery;

        //自定义验证规则
        form.verify({
            newpwd: function (value) {
                if (value.length < 11) {
                    return '密码至少得11个字符啊';
                } else if (value.length > 20) {
                    return '密码至多20个字符啊';
                }
            },
            confirmpwd: function (value) {
                if (value != $("input[name='newpwd']").val()) {
                    return '确认密码与新密码不一致';
                }
            }

        });
    });
</script>