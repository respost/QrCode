$(function(){
	//字体样式
    function setRem(){
        var clientWidth=$(window).width();
        var nowRem=(clientWidth/320*10);
        $("html").css("font-size",parseInt(nowRem, 10)+"px");
    };
    setRem();
    $(function(){
        var timer;
        $(window).bind("resize",function(){
            clearTimeout(timer)
            timer=setTimeout(function(){
                setRem();
            }, 100)
        })
    });
	//输入框字体长度大于1时，显示删除按钮
	$(".weui-input").bind('input propertychange',function () {
		if($(this).val()!=""){
			$(this).parent().find("i").show();
		}else{
			$(this).parent().find("i").hide();
		}
	});
	layui.use('form', function() {
		var form = layui.form;
		form.render('checkbox');
		//记住密码功能
		form.on('checkbox(filter)', function(data) {
			if (data.elem.checked) {
				$("#remflag").val("1");
			} else {
				$("#remflag").val("0");
			}
		});
	});
	//获取Cookie
	var str = getCookie("userCookie");
	if(str!=''){
		var arr=str.split('-');
		var username = arr[0].replace('"','');
		var pass = arr[1].replace('"','');
		//自动填充用户名和密码
		$("input[name='username']").val(username);
		$("input[name='password']").val(pass);
	}	
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
//显示和隐藏密码（眼睛睁开和关闭）
$(".eye").click(function(){
	//获取输入框对象
	var input=$(this).prev();
	//判断type类型
	if(input.attr("type")=="password"){
		input.attr("type","text");
		$(this).css("background-position","-42px -99px");
	}else{
		input.attr("type","password");
		$(this).css("background-position","0px -100px");
	}
});
//获取cookie
function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ')
			c = c.substring(1);
		if (c.indexOf(name) != -1)
			return c.substring(name.length, c.length);
	}
	return "";
};