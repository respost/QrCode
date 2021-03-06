<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\wwwroot\qr\public/../application/index\view\main\index.html";i:1611113930;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>用户中心</title>
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
			<a class="title-center">用户中心</a>
			<a href="<?php echo url('@index/logout'); ?>" class="title-right"><i class="iconfont" style="font-size:16px;">&#xe611;</i>退出</a>
		</div>
		</header>
		<!--头部 end-->
		<!--内容 star-->		
		<div class="contaniner">
			<div class="pay-img"><img src="/static/images/banner.jpg"></div>
			<form action="<?php echo url('@main/index'); ?>" method="post" onsubmit="return checkFrom()">		
			  <div class="weui-form-preview">
				  <input name="id" value="<?php echo $code['id']; ?>" type="hidden"/>
				  <div class="weui-form-preview__hd">
					<label class="weui-form-preview__label">用户账号：</label>
					<em class="weui-form-preview__value text-orange"><?php echo $user['username']; ?></em>
				  </div>
				  <div class="weui-form-preview__hd">
					<label class="weui-form-preview__label">二维码链接（已扫码<?php echo $code['count']; ?>次）：</label>
					<input class="weui-input" style="font-size:20px;" name="url" value="<?php echo $code['url']; ?>" placeholder="请输入二维码链接" type="text"/>
					<i href="javascript:;" class="text-del" ></i>
				  </div>
				  <div style="text-align:center;margin:20px auto;">
					  <?php if(!(empty($code['url']) || (($code['url'] instanceof \think\Collection || $code['url'] instanceof \think\Paginator ) && $code['url']->isEmpty()))): ?><img src="/api.html?text=<?php echo $code['url']; ?>"><?php endif; ?>
				  </div>
				  <div style="width:200px;margin:0 auto;">
					  <button id="btsubmit" type="submit" class="weui-btn weui-btn_plain-primary">点击保存</button>
				  </div>
			</div>								
			</form>
		</div>	
		<div id="footer">
			<button class="submit-button" id="poster">生成海报</button>
		</div>		
	</div>
	
	<div id="tong" style="display: none;overflow:hidden;"><img id="qr" src="" style="width:100%"></div>	
		<!--内容 end-->			
		<script type="text/javascript">
		layui.use(['element', 'upload', 'layer', 'form'], function() {
			var $ = layui.jquery,
				element = layui.element,
				upload = layui.upload,
				layer = layui.layer,
				form = layui.form;
			$('#poster').click(function() {
				id = layer.msg('正在为您生成，请稍候！', {
					icon: 16,
					shade: 0.01,
					time: 600 * 1000
				});
				$.get('/poster/<?php echo $code['id']; ?>.html',  function(res) {
					layer.close(id);
					if(res.status != 0) {
						layer.msg(res.msg, {
							icon: 5
						});
						return
					}
					$('#qr').attr("src", '/uploads/qr/' + res.msg);
					layer.open({
						type: 1,
						title: false,
						offset: '8rem',
						closeBtn: 1,
						area: '12rem',
						shadeClose: true,
						content: $('#tong')
					});
					downloadIamge('#qr', 'poster.png')
				});
			});
		});
		
		//按下回车
		$(document).keyup(function(event){
			if(event.keyCode=="13"){//13表示回车键的代码
				$('#btsubmit').click();
			}
		});
		//清空输入框内容
		$(".text-del").click(function(){
			$(this).parent().find("input").val("");
			$(this).hide();
			$(this).prev("i").hide();
		});
		//验证表单
		var regUrl=/http(s)?:\/\/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/;
		function checkFrom(){
			var url = $("input[name='url']").val();		
			if(regUrl.test(url)==false){
				$.alert('请输入正确的二维码链接', '提示');
				return false;
			}
			return true;
		}
		//获取输入框焦点
		$("input[name='url']").focus(function(){
			$(this).parent().find("i").show();
		});
		function downloadIamge(selector, name) {
			var img = document.querySelector(selector);
			var url = img.src;
			var a = document.createElement('a');
			var event = new MouseEvent('click');
			a.download = name;
			a.href = url;
			a.dispatchEvent(event)
		}
		</script>
	</body>

</html>