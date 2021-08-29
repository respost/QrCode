layui.use(['element', 'upload', 'layer', 'form'], function() {
	var $ = layui.jquery,
		element = layui.element,
		upload = layui.upload,
		layer = layui.layer,
		form = layui.form,
		url = '',
		id = '';
	upload.render({
		elem: '.upload',
		size: 2048,
		before: function() {
			id = layer.msg('上传识别中', {
				icon: 16,
				shade: 0.01,
				time: 60 * 1000
			})
		},
		done: function(res, index, upload) {
			layer.close(id);
			if(res.status == '0') {
				$('#' + this.pid).val(res.msg)
			} else {
				layer.msg(res.msg, {
					icon: 5
				})
			}
		},
		error: function(index, upload) {
			layer.close(id)
		}
	});
	$('#submit').click(function() {
		if(url != '') {
			layer.open({
				type: 1,
				title: false,
				closeBtn: 1,
				area: '20%',
				shadeClose: true,
				content: $('#tong')
			});
			downloadIamge('#qr', 'qr.png');
			return false
		} else if($('#ailpay').val() == '' || $('#qq').val() == '' || $('#wechat').val() == '') {
			layer.msg('请先上传收款二维码再生成！', {
				icon: 5
			});
			return false
		} else if($('#name').val().length > 5) {
			layer.msg('昵称最大限制5个字数', {
				icon: 5
			});
			return false
		}
		id = layer.msg('正在为您生成，请稍候！', {
			icon: 16,
			shade: 0.01,
			time: 600 * 1000
		});
		$.post('/make.html', {
			alipay: $('#alipay').val(),
			qq: $('#qq').val(),
			wechat: $('#wechat').val(),
			name: $('#name').val(),
			template: $('input[name=template]:checked').val()
		}, function(res) {
			layer.close(id);
			if(res.status != 0) {
				layer.msg(res.msg, {
					icon: 5
				});
				return
			}
			$('#qr').attr("src", '/uploads/qr/' + res.msg);
			url = res.msg;
			layer.open({
				type: 1,
				title: false,
				closeBtn: 1,
				area: '20%',
				shadeClose: true,
				content: $('#tong')
			});
			downloadIamge('#qr', 'qr.png')
		})
	})
});
$('.template').click(function() {
	var obj = $(this).next()[0];
	obj.checked = 'checked';
	layui.form.render()
});
$(function(){
    document.onkeydown = function(e){  
      var ev = document.all ? window.event : e;
	  //按下回车键
      if(ev.keyCode==13) {
          $('#submit').click();
      }
    }
	// 手机导航菜单
	if($('.menu-trigger').length){
		$(".menu-trigger").on('click', function() {	
			$(this).toggleClass('active');
			$('.header-area .nav').slideToggle(200);
		});
	}
	
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