<?php /*a:2:{s:53:"E:\WWW\phpPro\phpblog\app\index\view\users\login.html";i:1621924161;s:52:"E:\WWW\phpPro\phpblog\app\index\view\users\base.html";i:1634020991;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>wekenw-登录/注册</title>
		<link rel="stylesheet" href="/static/index/users/css/reset.css" />
		<link rel="stylesheet" href="/static/index/users/css/common.css" />
		<script>
			var _hmt = _hmt || [];
			(function() {
				var hm = document.createElement("script");
				hm.src = "https://hm.baidu.com/hm.js?37650e467733fc7bcab0aeeeb8ae1dc4";
				var s = document.getElementsByTagName("script")[0];
				s.parentNode.insertBefore(hm, s);
			})();
		</script>
	</head>
	<body>
		<div class="wrap login_wrap">
			<div class="content">

				<div class="logo"></div>

				<div class="login_box">

					<div class="login_form">
						
<div class="login_form">
    <div class="login_title">
        登录
    </div>

    <form action="" method="post" id="dologin">
        <input type="hidden" name="__token__" value="<?php echo token(); ?>"/>
		<input type="hidden" name="dosubmit" value="1"/>
        <div class="form_text_ipt">
            <input name="username" type="text" placeholder="手机号/邮箱">
        </div>
        <div class="ececk_warning"><span>数据不能为空</span></div>
        <div class="form_text_ipt">
            <input name="password" type="password" placeholder="密码">
        </div>
        <div class="ececk_warning"><span>数据不能为空</span></div>
        <div class="form_check_ipt">
            <div class="left check_left">
                <label><input name="" type="checkbox"> 下次自动登录</label>
            </div>
            <div class="right check_right">
                <a href="#">忘记密码</a>
            </div>
        </div>
        <div class="form_btn">
            <button type="button" onclick="checkForm();">登录</button>
        </div>
        <div class="form_reg_btn">
            <span>还没有帐号？</span><a href="<?php echo url('register/'); ?>">马上注册</a>
        </div>
    </form>
    <div class="other_login">
        <div class="left other_left">
            <span>其它登录方式</span>
        </div>
        <div class="right other_right">
            <a href="#">QQ登录</a>
            <a href="#">微信登录</a>
            <a href="#">微博登录</a>
        </div>
    </div>
</div>
<script>
    function checkForm(){
        var username = $("input[name='username']").val();
        var password = $("input[name='password']").val();
        if(!username || !password){
            alert('账号信息填写不完整');
            return false;
        }
        $('#dologin').submit();
    }
</script>

					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="/static/index/users/js/jquery.min.js" ></script>
		<script type="text/javascript" src="/static/index/users/js/common.js" ></script>
    </body>
</html>