<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"D:\wwwroot\qr\public/../application/index\view\index\qq.html";i:1585720886;s:46:"D:\wwwroot\qr\application\index\view\base.html";i:1585720833;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>QQ支付 - <?php echo \think\Config::get('title'); ?></title>
  <meta name="description" content="<?php echo \think\Config::get('description'); ?>">
  <meta name="keywords" content="<?php echo \think\Config::get('keywords'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
  <meta content="email=no" name="format-detection">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="format-detection" content="telephone=no">
  
<style type="text/css">
*{margin:0;padding:0}body{background:#f2f2f2}.banner{width:100%;display:block}.pay-content{padding:15% 7.8125%;background:#54b4ef;text-align:center}.pay-tips{padding-top:9.375%;color:#fff;font-size:18px}
</style>

</head>
<body>

<img class="banner" src="/static/images/icon-qq.jpg">
<div class="pay-content">
    <img src="/api.html?text=<?php echo $pay_url; ?>">
	<div class="pay-tips">长按识别二维码，向 “<?php echo $pay_name; ?>” 付款</div>
</div

</body>
</html>