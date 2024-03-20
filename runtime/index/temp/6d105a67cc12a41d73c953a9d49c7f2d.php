<?php /*a:2:{s:56:"E:\WWW\phpPro\phpblog\app\index\view\users\register.html";i:1621923826;s:52:"E:\WWW\phpPro\phpblog\app\index\view\users\base.html";i:1622001454;}*/ ?>
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
        注册
    </div>

    <form action="" method="post" id="doregister">
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
        <div class="form_text_ipt">
            <input name="repassword" type="password" placeholder="重复密码">
        </div>
        <div class="ececk_warning"><span>数据不能为空</span></div>
<!--        <div class="form_text_ipt">-->
<!--            <input name="code" type="text" placeholder="验证码">-->
<!--        </div>-->
<!--        <div class="ececk_warning"><span>数据不能为空</span></div>-->

        <div class="form_btn">
            <button type="button" onclick="checkForm();">注册</button>
        </div>
        <div class="form_reg_btn">
            <span>已有帐号？</span><a href="<?php echo url('login/'); ?>">马上登录</a>
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
	    var password = $("input[name='password']").val();
	    var repassword = $("input[name='repassword']").val();
	    if(password != repassword){
	        alert('两次密码输入不一致');
	        return false;
        }
	    $('#doregister').submit();
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