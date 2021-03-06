<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wwwroot\qr\public/../application/index\view\index\register.html";i:1589081062;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>用户注册</title>
		<link rel="stylesheet" href="/static/login/css/default.css" type="text/css">
		<!--引入阿里字体图标-->
		<link rel="stylesheet" type="text/css" href="/static/css/iconfont.css" />
		<!--引入jquery-->
		<script src="/static/js/jquery.min.js" charset="utf-8"></script>
		<!--引入jquery-weui框架-->
		<link rel="stylesheet" href="/static/weui/css/weui.min.css">
		<link rel="stylesheet" href="/static/weui/css/jquery-weui.min.css">
		<script src="/static/weui/js/jquery-weui.min.js" charset="utf-8"></script>	
	</head>

	<body>
	<div id="page">
		<!--头部  star-->
		<header>
		<div class="title-box">
			<a href="/" class="title-left"><i class="iconfont" style="font-size:16px;">&#xe619;</i>首页</a>
			<a class="title-center">用户注册</a>
			<a href="<?php echo url('@index/login'); ?>" class="title-right"><i class="iconfont" style="font-size:16px;">&#xe611;</i>登录</a>
		</div>
		</header>
		<!--头部 end-->
		<!--内容 star-->
		<form action="<?php echo url('@index/register'); ?>" method="post" onsubmit="return checkFrom()">
		<div class="contaniner">
			<div class="pay-img"><img src="/static/images/banner.jpg"></div>
			<div class="weui-cells">
				<div class="weui-cell">
					<div class="weui-cell__hd"><label class="weui-label">手机号码:</label></div>
					<div class="weui-cell__bd">
						<input class="weui-input" name="username" placeholder="请输入手机号码" type="number">
					</div>
				</div>
				<div class="weui-cell">
					<div class="weui-cell__hd"><label class="weui-label">登录密码 :</label></div>
					<div class="weui-cell__bd">
						<input class="weui-input" name="password" placeholder="请输入密码" type="password">
					</div>
				</div>
				<div class="weui-cell">
					<div class="weui-cell__hd"><label class="weui-label">确认密码 :</label></div>
					<div class="weui-cell__bd">
						<input class="weui-input" name="repassword" placeholder="请再次输入密码" type="password">
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<button class="submit-button" type="submit">立即注册</button>
		</div>
		</form>
	</div>	
		<!--内容 end-->		
		<script type="text/javascript">
		//验证表单
		function checkFrom(){
			var username = $("input[name='username']").val();
			var password = $("input[name='password']").val();
			var repassword = $("input[name='repassword']").val();
			var regName=/^1[0-9]{10}$/;
			if(regName.test(username)==false){
				$.alert('请输入正确的手机号码<br>(1开头的11位数字)', '提示');
				return false;
			}
			var regPwd=/^[0-9a-zA-Z]{6,20}$/;
			if(regPwd.test(password)==false){
				$.alert('请输入有效的密码<br>(由英文字母和数字组成的6-20位字符)', '提示');
				return false;
			}
			if(repassword!=password){
				$.alert('两次输入的密码不一致', '提示');
				return false;
			}
			return true;
		}
		</script>
	</body>

</html>