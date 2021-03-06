<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\wwwroot\qr\public/../application/index\view\index\login.html";i:1589098382;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>用户登录</title>
		<link rel="stylesheet" href="/static/login/css/default.css" type="text/css">
		<!--引入阿里字体图标-->
		<link rel="stylesheet" type="text/css" href="/static/css/iconfont.css" />
		<!--引入jquery-->
		<script src="/static/js/jquery.min.js" charset="utf-8"></script>			
		<!--引入jquery-weui框架-->
		<link rel="stylesheet" href="/static/weui/css/weui.min.css">
		<link rel="stylesheet" href="/static/weui/css/jquery-weui.min.css">
		<script src="/static/weui/js/jquery-weui.min.js" charset="utf-8"></script>
		<!-- 引入layui -->
		<link rel="stylesheet" href="/static/layui/css/layui.css">
		<script type="text/javascript" src="/static/layui/layui.js"></script>		
	</head>

	<body>
	<div id="page">
		<!--头部  star-->
		<header>
		<div class="title-box">
			<a href="/" class="title-left"><i class="iconfont" style="font-size:16px;">&#xe619;</i>首页</a>
			<a class="title-center">用户登录</a>
			<a href="<?php echo url('@index/register'); ?>" class="title-right"><i class="iconfont" style="font-size:16px;">&#xe611;</i>注册</a>
		</div>
		</header>
		<!--头部 end-->
		<!--内容 star-->
		<form action="<?php echo url('@index/login'); ?>" method="post" onsubmit="return checkFrom()">
		<div class="contaniner">
			<div class="pay-img"><img src="/static/images/banner.jpg"></div>
			<div class="weui-cells">
				<div class="weui-cell">
					<div class="weui-cell__bd">
						<input class="weui-input fixed-input login_user" name="username" placeholder="请输入手机号码" type="number">
						<i href="javascript:;" class="text-del" ></i>
					</div>
				</div>
				<div class="weui-cell">
					<div class="weui-cell__bd">
						<input class="weui-input fixed-input login_pwd" name="password" placeholder="请输入密码" type="password">
						<i href="javascript:;"  class="eye" ></i><i href="javascript:;" class="text-del" ></i>
					</div>
				</div>
			</div>
			<div class="login-btn">
				<button id="btsubmit" type="submit" class="weui-btn weui-btn_primary">立即登录</button>
			</div>
			<div class="layui-form login-auto">
				<div class="login-auto-left">
					<input type="hidden" name="remflag" id="remflag" value="1">
					<input type="checkbox" id="check" title="下次自动登录" lay-filter="filter" lay-skin="primary" checked>
				</div>				
				<div class="login-auto-right">
					<a href="javascript:void;" onclick="forgetPwd()">忘记密码?</a>
				</div>				
			</div>
		</div>
		</form>
	</div>	
	<!--内容 end-->	
		<script src="/static/login/js/default.js" charset="utf-8"></script>		
		<script type="text/javascript">
		//验证表单
		function checkFrom(){
			var username = $("input[name='username']").val();
			var password = $("input[name='password']").val();
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
			return true;
		}
		//忘记密码
		function forgetPwd(){
			$.alert("请联系客服");
		}
		</script>
	</body>

</html>