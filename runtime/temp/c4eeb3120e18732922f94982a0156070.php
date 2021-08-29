<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:55:"D:\qr\public/../application/index\view\index\index.html";i:1589076590;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="description" content="<?php echo \think\Config::get('description'); ?>">
		<meta name="keywords" content="<?php echo \think\Config::get('keywords'); ?>">
		<title><?php echo \think\Config::get('title'); if(\think\Config::get('siteinfo')) echo ' - ' .\think\Config::get('siteinfo'); ?></title>	
		<!--引入bootstrap-->
		<link rel="stylesheet" href="/static/css/bootstrap.min.css" />
		<!--引入layui-->
		<link rel="stylesheet" href="/static/layui/css/layui.css" />		
		<!--引入swiper轮播图-->
		<link rel="stylesheet" href="/static/swiper-5.3.6/css/swiper.min.css" />
		<link rel="stylesheet" href="/static/css/style.css" />
		<style type="text/css">
			html {background-color: rgb(248, 249, 250);}
			img{ pointer-events: none; }
			input[type="text"]{text-align:center;font-size: 17px;border-radius: 20px;height: 45px;}
			.bg{background-color: #eeeeee;}
			.footer {margin: 50px 0 0;padding: 20px 0 30px;line-height: 30px;text-align: center;color: #737573; border-top: 1px solid #e2e2e2;    }
			a{color: #6d757a;}
			.and{padding-top: 50px;text-align: center;}
			.and i{font-size: 100px;color: #1E9FFF;}
			.layui-nav{position: absolute;right: 0;top: 0;padding: 0;background: none;}
			@media screen and (max-width:993px) {
				.and{padding-top: 0px;}
				.layui-main{width: 100%;}
				.layui-nav{display: none;}
				.layui-carousel{display: none;}
			}			
			.template {
				height: 350px;
				border: 1px solid #DDD;
				border-radius: 10px;
				margin: 10px;
			}		
			.template img {
				width: 100%;
				height: 100%;
				border-radius: 10px;
			}
			.swiper-slide {
				width: 100%;
				height: 500px;
				background-size:auto;
			}		
			.swiper-slide img {
				height: 100%;
				width: 100%;
			}
			/* 小于640px */		
			@media all and (max-width:640px) {
				.template {
				height: 200px;
				border: 1px solid #DDD;
				border-radius: 10px;
				margin: 10px;
				}
				.swiper-slide {
					height: 200px;
				}  		
			}
			/* 小于320px */		
			@media all and (max-width:320px) {
				.swiper-slide {
					height: 150px;
				}  				
			}
		</style>
	</head>

	<body>
	<!-- ***** Header Area Start ***** -->
	<header class="header-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav class="main-nav">
						<!-- ***** Logo Start ***** -->
						<a href="/" class="logo">
							<img src="/static/images/logo.png" width="200" height="52" class="light-logo" alt="收款码"/>
							<img src="/static/images/logo.png" width="135" height="35" class="dark-logo" alt="收款码"/>
						</a>
						<!-- ***** Logo End ***** -->

						<!-- ***** Menu Start ***** -->
						<ul class="nav">
						<?php if(is_array(\think\Config::get('link')) || \think\Config::get('link') instanceof \think\Collection || \think\Config::get('link') instanceof \think\Paginator): if( count(\think\Config::get('link'))==0 ) : echo "" ;else: foreach(\think\Config::get('link') as $k=>$vo): ?>
							<li>
								<a href="<?php echo $vo; ?>" target="_black"><?php echo $k; ?></a>
							</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
						<a class='menu-trigger'>
							<span>菜单</span>
						</a>
						<!-- ***** Menu End ***** -->
					</nav>
				</div>
			</div>
		</div>
	</header>
		<div class="swiper-container" style="text-align: center;margin-top:80px;">
			<div class="swiper-wrapper">
				<div class="swiper-slide"><img src="/static/images/bg01.jpg"></div>
				<div class="swiper-slide"><img src="/static/images/bg02.jpg"></div>
				<div class="swiper-slide"><img src="/static/images/bg03.jpg"></div>
			</div>
			<!-- 如果需要分页器 -->
			<div class="swiper-pagination"></div>											
		</div>
		<div class="layui-container" style="text-align: center;">
			<fieldset class="layui-elem-field layui-field-title">
				<legend>收款码三合一</legend>
				<div class="layui-field-box">
					将微信收款码、QQ收款码和支付宝收款码合并为一个二维码，用户扫码后直接付款给商家，无需手续费。
				</div>
			</fieldset>
			<div class="layui-row">
				<div class="layui-col-md3">
				  <div class="grid-demo grid-demo-bg1">
					<div class="layui-upload-drag upload" lay-data="{url: '<?php echo url('index/uploads','pay=alipay'); ?>',pid:'alipay'}">
					  <img src="/static/images/alipay.png">
					</div>
				  </div>
				</div>
				<div class="layui-col-md6">
					<div class="layui-row">
						<div class="layui-col-md3 and"><i class="layui-icon">&#xe654;</i></div>
						<div class="layui-col-md6">
							<div class="grid-demo">
								<div class="layui-upload-drag upload" lay-data="{url: '<?php echo url('index/uploads','pay=qq'); ?>',pid:'qq'}">
									<img src="/static/images/qq.png">
								</div>
							</div>
						</div>
						<div class="layui-col-md3 and"><i class="layui-icon">&#xe654;</i></div>
					</div>
				</div>
				<div class="layui-col-md3">
				  <div class="grid-demo grid-demo-bg1">
					<div class="layui-upload-drag upload" lay-data="{url: '<?php echo url('index/uploads','pay=wechat'); ?>',pid:'wechat'}">
					  <img src="/static/images/wechat.png">
					</div>
				  </div>
				</div>
			</div>
			<div class="layui-row" style="margin-top: 20px;">
				<div class="layui-col-md12" style="text-align: center;">
					<div class="layui-form-item">
						<input type="text" name="alipay" required lay-verify="required" placeholder="支付宝收款码" autocomplete="off" class="layui-input layui-disabled bg" disabled id="alipay">
					</div>
					<div class="layui-form-item">
						<input type="text" name="qq" required lay-verify="required" placeholder="QQ收款码" autocomplete="off" class="layui-input layui-disabled bg" disabled id="qq">
					</div>
					<div class="layui-form-item">
						<input type="text" name="wechat" required lay-verify="required" placeholder="微信收款码" autocomplete="off" class="layui-input layui-disabled bg" disabled id="wechat">
					</div>
					<div class="layui-form-item">
						<input type="text" name="name" required lay-verify="required" placeholder="请输入收款人昵称" autocomplete="off" class="layui-input " id="name">
					</div>
					<div class="layui-row layui-form">
						<div class="layui-form-item">
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/001.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="001" checked="checked" title="默认模板">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>默认模板</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/002.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="002" title="白灰打印">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>白灰打印</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/003.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="003" title="绿色竖版">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>绿色竖版</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/004.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="004" title="纯黄">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>纯黄</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/005.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="005" title="纯蓝">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>纯蓝</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/006.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="006" title="招财猫">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>招财猫</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/007.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="007" title="国庆">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>国庆</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/008.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="008" title="红包款式">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>红包款式</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/009.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="009" title="灰白款式">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>灰白款式</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/010.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="010" title="简约风格">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>简约风格</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/011.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="011" title="指纹红包">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>指纹红包</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/012.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="012" title="小程序风格">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>小程序风格</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/013.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="013" title="开学季">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>开学季</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/014.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="014" title="快捷支付">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>快捷支付</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/015.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="015" title="蓝底白版">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>蓝底白版</div>
								</div>
							</div>
							<div class="layui-col-xs6  layui-col-sm4  layui-col-md3">
								<div class="template">
									<img src="/static/images/template/016.jpg">
								</div>
								<input type="radio" name="template"  lay-filter="template" value="016" title="蓝色狗款式">
								<div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i>
									<div>蓝狗款式</div>
								</div>
							</div>
						</div>
					</div>
					<button class="layui-btn layui-btn-lg layui-btn-radius layui-btn-normal" id="submit">一键合成</button>
				</div>
			</div>
			<?php if(\think\Config::get('explain') == 'on'): ?>
				<div class="layui-row" style="padding-top:50px;">
					<fieldset class="layui-elem-field">
						<legend>常见问题</legend>
						<div class="layui-field-box" style="text-align:left;line-height: 30px;">
							<b>1.合并后的收款码有扫码次数和时间限制吗？</b>
							<p>无限制扫码次数，永久可用。</p>
							<b>2.合并后的二维码安全吗？</b>
							<p>安全。技术上，我们只是对三种类型的收款码进行合并，让用户收款使用更方便。</p>
							<b>3.别人扫码付款后，钱打到哪里去了？</b>
							<p>打到您的个人账户。具体来说：微信扫码付款时，钱打到您的微信钱包里；支付宝扫码付款时，钱打到您的支付宝账户里；QQ扫码付款时，钱打到您的QQ钱包里。</p>
							<b>4.为什么微信、QQ扫码后还需要长按识别？</b>
							<p>微信、QQ接口未开放权限，无法直接调起微信、QQ转账页面，所以需要长按识二维码别进行转账。目前支付宝接口已开放权限，可以直接扫码付款。</p>
							<b>5.使用此功能时，支付宝、微信、QQ会向我收取费用吗？</b>
							<p>不会，此功能是对二维码进行合并，不涉及微信、支付宝、QQ的收费问题。
								<p>
									<b>6.在网站上传收款码会泄露用户隐私资料吗？</b>
									<p>不会。收款码是个人的收款二维码，是客户向对方转账的一种方式，和商家平时向客户展示的收款码是一样的。</p>
									<b>7.合并后的二维码能通过微信或者支付宝或者QQ扫码转账码？</b>
									<p>可以。通过合并后的二维码可以自动识别用户扫码方式，微信扫码则使用微信支付，支付宝扫码则使用支付宝支付，QQ扫码则使用QQ支付。</p>
									<b>8.合并二维码对于商家有什么好处？</b>
									<p>①对于商家来说可免中间手续费，收款直接转入到商家个体账户，不需经过第三方公司提现。</p>
									<p>②一码在手，随扫随有：只保留一个扫码牌就可以了。</p>
									<p>③我们承诺：三码合一功能永久免费使用。</p>
						</div>
					</fieldset>
					<fieldset class="layui-elem-field">
						<legend>产品优势</legend>
						<div class="layui-field-box" style="line-height: 35px;">
							<div class="layui-row">
								<div class="layui-col-md3" style="padding-right: 10px;"><img src="/static/images/1.png">
									<h3>一码收款</h3>通过合并后的二维码可以自动识别用户扫码方式，微信扫码则使用微信支付，支付宝扫码则使用支付宝支付，商家无需打印2个二维码，节省成本与空间。</div>
								<div class="layui-col-md3" style="padding-right: 10px;"><img src="/static/images/2.png">
									<h3>收益最大化</h3>全新扫码转账技术，钱直接转到商家个体账户，收款啦不参与中间转账过程，完全免费提供技术支持，保证商家利益。</div>
								<div class="layui-col-md3" style="padding-right: 10px;"><img src="/static/images/3.png">
									<h3>免提现费</h3>用户通过扫描合并后的二维码转账，直接转到商户个体账户里，省去千分之6的手续费。</div>
								<div class="layui-col-md3"><img src="/static/images/4.png">
									<h3>轻松快捷</h3>一码收款，对于用户，无需关注扫码支付方式，直接扫码付款即可。不用担心不能微信支付或者支付宝支付。</div>
							</div>
						</div>
					</fieldset>
				</div>
				<?php endif; ?>
		</div>
		<div id="tong" style="display: none;"><img id="qr" src="/static/images/template/001.jpg" style="width:100%"></div>
		<div class="footer">
			<p>
				<?php echo \think\Config::get('copyright'); ?>
			</p>
			<?php if(\think\Config::get('statis')=='on'): ?>
				<p>今日生成<?php echo $count; ?>次，累计生成<?php echo $total; ?>次，累计扫描<?php echo $number; ?>次</p>
			<?php endif; ?>
		</div>
		<script src="/static/js/jquery.min.js"></script>
		<!--引入layui-->
		<script src="/static/layui/layui.js"></script>
		<!--引入swiper轮播图-->
		<script src="/static/swiper-5.3.6/js/jquery-1.11.3.min.js"></script>
		<script src="/static/swiper-5.3.6/js/swiper.min.js"></script>
		<script src="/static/js/index.js"></script>
		<script>        
		  var mySwiper = new Swiper ('.swiper-container', {
			loop: true,    // 循环模式	
			autoplay: true,// 自动滑动
			// 分页器
			pagination: {
			  el: '.swiper-pagination',
			},			
		  })        
	  </script>
	</body>

</html>