<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"D:\wwwroot\qr\public/../application/index\view\index\qr.html";i:1585487736;s:46:"D:\wwwroot\qr\application\index\view\base.html";i:1585720833;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>三合一万能码 - <?php echo \think\Config::get('title'); ?></title>
  <meta name="description" content="<?php echo \think\Config::get('description'); ?>">
  <meta name="keywords" content="<?php echo \think\Config::get('keywords'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
  <meta content="email=no" name="format-detection">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="format-detection" content="telephone=no">
  
<style type="text/css">
* {margin: 0; padding: 0;}.code-area {margin: 0 auto;max-width: 500px;}.code-area img {margin: 80px 0;width: 100%;}
</style>

</head>
<body>

<div class="code-area">
    <img src="/static/images/qr/<?php echo $url; ?>">
</div>

</body>
</html>