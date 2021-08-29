{__NOLAYOUT__}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <title>跳转提示</title>
	<!--引入dialog.css样式-->
    <link rel="stylesheet" href="__PUBLIC__/css/dialog.css">
    <style type="text/css">
		.system-message p{ text-align: center;}
		.system-message .jump{ padding-top: 10px}
		.system-message .jump a{ color: #333;}
		.system-message .jump-btn{margin-top: 40px}
		.system-message .jump-btn a{font-size: 16px;color: #fff;border-radius: 4px;background-color: #0d65a3;padding: 6px 16px;text-decoration: none;}
	</style>
</head>
<body>
    <div class="system-message">
		<div id='animationTipBox'>
        <?php switch ($code) {?>
            <?php case 1:?>
			<!--成功-->          
				<div class='success'>
				   <div class='icon'>
					   <div class='icon_box'>
						   <div class='line_short'></div>
						   <div class='line_long'></div>
					   </div>
				   </div>
					<div class='dec_txt'><?php echo(strip_tags($msg));?></div>					
				</div>
            <?php break;?>
            <?php case 0:?>
			<!--错误-->
				<div class='lose'>
				   <div class='icon'>
					   <div class='icon_box'>
						   <div class='line_left'></div>
						   <div class='line_right'></div>
					   </div>
				   </div>
					<div class='dec_txt'><?php echo(strip_tags($msg));?></div>					
				</div>							
            <?php break;?>
        <?php } ?>
			<p class="jump">
				页面自动<a id="href" href="<?php echo($url);?>">跳转</a> 等待时间： <b id="wait"><?php echo($wait);?></b>
			</p>
			<p class="jump-btn"><a id="href" href="<?php echo($url); ?>">点击跳转</a></p>
		</div>		
    </div>
    <script type="text/javascript">
        (function(){
            var wait = document.getElementById('wait'),
                href = document.getElementById('href').href;
            var interval = setInterval(function(){
                var time = --wait.innerHTML;
                if(time <= 0) {
                    location.href = href;
                    clearInterval(interval);
                };
            }, 1000);
        })();
    </script>
</body>
</html>