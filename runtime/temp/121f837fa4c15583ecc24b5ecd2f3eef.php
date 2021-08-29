<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\wwwroot\qr\public/../application/index\view\index\support.html";i:1585740807;s:46:"D:\wwwroot\qr\application\index\view\base.html";i:1585720833;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>赞助开发者 - <?php echo \think\Config::get('title'); ?></title>
  <meta name="description" content="<?php echo \think\Config::get('description'); ?>">
  <meta name="keywords" content="<?php echo \think\Config::get('keywords'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
  <meta content="email=no" name="format-detection">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="format-detection" content="telephone=no">
  
<style type="text/css">
*{margin:0;padding:0}
body{background:#f2f2f2}
.pay-content{
	width: 640px;
	margin: 0 auto;
	min-height:100vh;
	padding:0 7.8125% 5% 7.8125%;
	text-align:center;
	background:#54bc6e;
}
.pay-content img{
	width: 100%;
	height: 100%;
	justify-content: center;
}
/* 小于640px */		
@media all and (max-width:640px) {
	.pay-content{
		width: 100%;
		padding:0;
	}
}
.pay-content h3{color:#fff;font-size:18px;height:80px;line-height:80px;}
.pay-tips{height:80px;line-height:80px;color:#fff;font-size:18px}
</style>

</head>
<body>

<div class="pay-content">
	<h3>扫下方收款二维码，赞助开发者</h3>
    <img src="/static/images/mycode.png">
	<div class="pay-tips">我坚信，赞赏是不耍流氓的鼓励!</div>
</div

</body>
</html>