// JavaScript Document
$(function(){
	$(window).scroll(function(){
		if($(window).scrollTop()>150){
			$('.top').css('display','block')
		}else{
			$('.top').css('display','none')
		}
	})
	$('.top').click(function(){
		$('body,html').animate({
			scrollTop:'0px'
		},400);
	})	
	
	$(window).scroll(function(){
		if($(window).scrollTop()>460){
			$('.header').css('display','block');
			$('.header').css("background","FFD8CF");
		}else if($(window).scrollTop()<80){
			$('.header').css('display','block');
			$('.header').css("background","FFD8CF");
		}
		else{
			$('.header').css('display','none')
		}
	})
})


function checkLoginForm() {
	var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    if (username == null || username == "") {
        alert("用户名不能为空！");
        document.getElementById("username").focus();
        return false;
    }
    if (password == null || password == "") {
        alert("密码不能为空！");
        document.getElementById("password").focus();
        return false;
    }
	/*if(password.length < 2) {
        alert("密码长度必须为2-16位");
        $("password").focus();
        return false;
    }*/
    return true;
}

function checkRegistForm(){
	if(myform.name.value==""){
		 alert("请输入用户名");
		 myform.name.focus();
		 return false;
	 }
	 if (myform.pwd.value==""){
		 alert("请输入密码");
		 myform.pwd.focus();
		 return false;
	 }
	 if(myform.pwdconfirm.value==""){
		 alert("请再一次输入密码");
		 myform.pwdconfirm.focus();
	 }
	 if(myform.pwd.value != myform.pwdconfirm.value){
		 alert("你输入的两次密码不一致，请重新输入！");
		 myform.pwd.focus();
		 return false;
	 }
	 if (myform.yzm.value==""){
		 alert("请输入验证码");
		 myform.yzm.focus();
		 return false;
	 }
}


//评论部分

$(document).ready(function(){
	$.getJSON("./php/data.php", function(json){
		function sort(a,b){
			return a.int-b.int;
		}
		json.sort(sort);//进行数据排序
		$.each(json, function(index, array){
			var data = "<li><p>" + "用户" + array["user"] + ":" + "</p><span>" + array["comment"] + "</span><a>" + array["addtime"] + "</a></li>";
			$(".ul").append(data);
		});
	});
	
	$(".btn").click(function(){
		function p(s){
			return s < 10 ? '0' + s : s;
		}
		var myDate = new Date();
        var year=myDate.getFullYear();
        var month=myDate.getMonth()+1;
        var date=myDate.getDate(); 
        var h=myDate.getHours();
        var m=myDate.getMinutes();
        var s=myDate.getSeconds();  
        var now=year+'-'+p(month)+"-"+p(date)+" "+p(h)+':'+p(m)+":"+p(s);
		
		if($(".com_box .text").val().length === 0){
			
		}else{
			$.ajax({
				type:"POST",
				url:"./php/msg.php",
				data:{"user":$(".con .user").html(),"comment":$(".com_box .text").val(),"addtime":now},
                success:function(data){
					var str= "<li><p>" + "用户" + $(".con .user").html() + ":" + "</p><span>" + $(".com_box .text").val() + "</span><a>" + now + "</a></li>";
                            
                     $(".ul").append(str);
                     alert(data);
				},
				error:function(){  
                	console.log("失败，请稍后再试！");  
				},
			});
		}
	});
});


